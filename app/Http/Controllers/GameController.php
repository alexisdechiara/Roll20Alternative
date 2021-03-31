<?php


namespace App\Http\Controllers;


use App\Models\Actions;
use App\Models\Chats;
use App\Models\Parties;
use App\Models\Players;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use JsonException;

class GameController extends Controller
{

    public function create()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        return view('games.create');
    }

    public function createParty(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|min:8|string',
            'players' => 'required|max:4|min:1',
            'description' => 'required|max:1600|min:15|string',
        ]);

        $slug = $this->uid(6);

        try {
            Parties::firstOrCreate([
                'name' => $request->input('name'),
                'user_id' => Auth::id(),
                'slug' => $slug,
                'players' => $request->input('players'),
                'description' => $request->input('description'),
                'cover_picture' => $request->input('cover_picture'),
                'password' => $request->input('password'),
                'themes' => json_encode($request->input('themes'), JSON_THROW_ON_ERROR)
            ]);
        } catch (JsonException $e) {
        }

        return redirect('/game/' . $slug);
    }

    public function uid($l)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $l);
    }

    public function joinParty(Request $request)
    {
        $pid = $request->input('party_id');
        $party = Parties::where('id', $pid)->first();
        if (($party['password'] !== null) && $request->input('password') !== $party['password']) {
            throw ValidationException::withMessages(['password' => 'Mot de passe incorrect']);
        }

        $n = Players::where('party_id', $pid)->count();
        if ($n < $party['players']) {
            Players::firstOrCreate([
                'party_id' => $pid,
                'user_id' => Auth::id()
            ]);
        }
        return redirect('/game/' . $party['slug']);
    }

    public function join()
    {

        if (!Auth::check()) {
            return redirect('/login');
        }

        $parties = Parties::orderBy('id', 'desc')->take(10)->get();
        return view('games.join', ["parties" => $parties]);
    }


    public function game(string $slug)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $party = Parties::where('slug', $slug)->first();
        if ($party === null) {
            return redirect('/join');
        }

        $players = Players::where('party_id', $party['id'])->get();
        return view('games.game', ['party' => $party, 'players' => $players]);
    }

    public function chatParty(Request $request): void
    {
        $uid = Auth::id();
        $pid = $request->input('party_id');
        $message = htmlspecialchars($request->input('message'));
        $player = Players::where('user_id', $uid)->where('party_id', $pid)->first();

        if ($player || Parties::where('id', $pid)->first()['user_id'] === $uid) {
            Chats::insert([
                'party_id' => $pid,
                'user_id' => $uid,
                'message' => $message,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]);
        }
    }

    public function leaveParty(Request $request)
    {
        $uid = Auth::id();
        $pid = $request->input("party_id");
        if (inParty(Parties::where('id', $pid)->first(), Auth::user())) {
            Players::where('party_id', $pid)->where('user_id', $uid)->delete();
        }
        return redirect(route('home'));
    }

    public function disbandParty(Request $request)
    {
        $uid = Auth::id();
        $pid = $request->input("party_id");
        $party = Parties::where('id', $pid)->first();
        if ($party['user_id'] === $uid) {
            Parties::where('id', $pid)->delete();
        }
        return redirect(route('home'));
    }

    public function getBoard($party_id)
    {
        $party = Parties::where('id', $party_id)->first();
        return $party['board'];
    }

    public function saveBoard(Request $request): void
    {
        $uid = Auth::id();
        $pid = $request->input('party_id');
        $data = $request->input('data');

        $party = Parties::where('id', $pid)->first();
        if ($party['user_id'] === $uid) {
            Parties::where('id', $pid)->update([
                "board" => $data,
            ]);
        }

    }

    public function moveToken(Request $request): void
    {

    }

    public function getChat(string $party_id, int $n)
    {
        $uid = Auth::id();
        $player = Players::where('user_id', $uid)->where('party_id', $party_id)->first();

        if ($player || Parties::where('id', $party_id)->first()['user_id'] === $uid) {
            $messages = collect();
            $messages = $messages->merge(Chats::where('party_id', $party_id)->orderBy('created_at', 'desc')->get())->sortByDesc('created_at');
            $messages = $messages->merge(Actions::where('party_id', $party_id)->orderBy('created_at', 'desc')->get())->sortByDesc('created_at');
            $toReturn = [];

            foreach ($messages as $m) {
                if ($m->getTable() === "chats") {
                    $re = '/^\/msg\s(\S*)\s(.*)$/m';
                    preg_match_all($re, $m['message'], $matches, PREG_SET_ORDER);
                    if (!empty($matches)) {
                        $term = strtolower($matches[0][1]);
                        if (str_contains($term, '#')) {
                            $term_uid = explode("#", $term)[count(explode("#", $term)) - 1];
                            if (in_array($uid . '', [$m['user_id'] . '', $term_uid . ''], true)) {
                                $toReturn[] = [
                                    'isGM' => ($m['user_id'] === Parties::where('id', $party_id)->first()['user_id']),
                                    'id' => $m['user_id'],
                                    'type' => 'chat',
                                    'username' => getUser($m['user_id'], 'username'),
                                    'pp' => (getUser($m['user_id'], 'profile_picture') ?? asset("/img/user.svg")),
                                    'message' => $m['message'],
                                    'date' => $m['created_at']];
                            }
                        }
                    } else {
                        $toReturn[] = [
                            'isGM' => ($m['user_id'] === Parties::where('id', $party_id)->first()['user_id']),
                            'type' => 'chat',
                            'id' => $m['user_id'],
                            'username' => getUser($m['user_id'], 'username'),
                            'pp' => (getUser($m['user_id'], 'profile_picture') ?? asset("/img/user.svg")),
                            'message' => $m['message'],
                            'date' => $m['created_at']
                        ];
                    }
                } else if ($m->getTable() === "actions") {
                    $mr = json_decode($m['data'], JSON_THROW_ON_ERROR);

                    if ($mr['info']['rollHide'] && ($m['user_id'] === Parties::where('id', $party_id)->first()['user_id'])) {
                        $toReturn[] = [
                            'id' => $m['user_id'],
                            'type' => 'action',
                            'action' => 'dice',
                            'data' => $m['data'],
                            'username' => getUser($m['user_id'], 'username'),
                            'date' => $m['created_at']
                        ];
                    } else {
                        $toReturn[] = [
                            'id' => $m['user_id'],
                            'type' => 'action',
                            'action' => 'dice',
                            'data' => $m['data'],
                            'username' => getUser($m['user_id'], 'username'),
                            'date' => $m['created_at']
                        ];
                    }
                }
            }
            try {
                return json_encode(array_slice($toReturn, 0, count($toReturn) - $n), JSON_THROW_ON_ERROR | true);
            } catch (JsonException $e) {
                return $e->getMessage();
            }
        }
        return null;
    }


    public function rollDice(Request $request)
    {
        $uid = Auth::id();
        $pid = $request->input("pid");
        $party = Parties::where('id', $pid)->first();

        if (inParty($party, Auth::user()) || $party['user_id'] === $uid) {
            $request->validate([
                'rollValue' => 'required|max:1000|min:2|int',
                'rollNumber' => 'required|max:10|min:1|int',
                'rollHide' => 'nullable',
            ]);

            $data['info'] = [
                "rollValue" => $request->input("rollValue"),
                "rollNumber" => $request->input("rollNumber"),
                "rollHide" => $request->input("rollHide") === "on"
            ];
            $data['result'] = [];
            for ($i = 0; $i < $request->input("rollNumber"); $i++) {
                try {
                    $data['result'][$i] = random_int(1, $request->input("rollValue"));
                } catch (Exception $e) {
                    return $e->getMessage();
                }
            }
            try {
                Actions::insert([
                    'party_id' => $request->input("pid"),
                    'user_id' => $uid,
                    'type' => "dice",
                    'data' => json_encode($data, JSON_THROW_ON_ERROR),
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now()
                ]);
            } catch (JsonException $e) {
                return $e->getMessage();
            }
        }
        return null;
    }

}
