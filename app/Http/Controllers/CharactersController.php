<?php /** @noinspection PhpUndefinedMethodInspection */


namespace App\Http\Controllers;


use App\Models\Armors;
use App\Models\Characteristics;
use App\Models\Characters;
use App\Models\Items;
use App\Models\Skills;
use App\Models\Stuffs;
use App\Models\User;
use App\Models\Weapons;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use JsonException;

class CharactersController extends Controller
{

    public function create()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        return view('characters.create');
    }

    public function edit($id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $character = Characters::where('id', $id)->first();
        try {
            $stuffs = explode(",", json_decode($character['stuffs_id'], true, 512, JSON_THROW_ON_ERROR)[0]);
        } catch (JsonException $e) {
            return $e->getMessage();
        }
        $weapons = [];
        $skills = [];
        $items = [];
        $armors = [];
        if (count($stuffs) > 0 && $stuffs[0] !== "") {
            foreach ($stuffs as $s) {
                $st = Stuffs::where('id', $s)->first();
                if ($st['type'] === 'weapon') {
                    if (empty($weapons)) {
                        $weapons = Weapons::where('id', $st['type_id'])->get();
                    } else {
                        $weapons = $weapons->merge(Weapons::where('id', $st['type_id'])->get());
                    }
                } else if ($st['type'] === 'skill') {
                    if (empty($skills)) {
                        $skills = Skills::where('id', $st['type_id'])->get();
                    } else {
                        $skills = $skills->merge(Skills::where('id', $st['type_id'])->get());
                    }
                } else if ($st['type'] === 'armor') {
                    if (empty($armors)) {
                        $armors = Armors::where('id', $st['type_id'])->get();
                    } else {
                        $armors = $armors->merge(Armors::where('id', $st['type_id'])->get());
                    }
                } else if ($st['type'] === 'item') {
                    if (empty($items)) {
                        $items = Items::where('id', $st['type_id'])->get();
                    } else {
                        $items = $items->merge(Items::where('id', $st['type_id'])->get());
                    }
                }
            }
        }

        if ($character['user_id'] === Auth::id()) {
            return view('characters.edit', ['character' => $character, 'weapons' => $weapons, 'skills' => $skills, 'armors' => $armors, 'items' => $items]);
        }
        return redirect(route('listCharacter'));
    }

    public function show($id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $character = Characters::where('id', $id)->first();
        try {
            $stuffs = explode(",", json_decode($character['stuffs_id'], true, 512, JSON_THROW_ON_ERROR)[0]);
        } catch (JsonException $e) {
            return $e->getMessage();
        }
        $weapons = [];
        $skills = [];
        $items = [];
        $armors = [];
        if (count($stuffs) > 0 && $stuffs[0] !== "") {
            foreach ($stuffs as $s) {
                $st = Stuffs::where('id', $s)->first();
                if ($st['type'] === 'weapon') {
                    if (empty($weapons)) {
                        $weapons = Weapons::where('id', $st['type_id'])->get();
                    } else {
                        $weapons = $weapons->merge(Weapons::where('id', $st['type_id'])->get());
                    }
                } else if ($st['type'] === 'skill') {
                    if (empty($skills)) {
                        $skills = Skills::where('id', $st['type_id'])->get();
                    } else {
                        $skills = $skills->merge(Skills::where('id', $st['type_id'])->get());
                    }
                } else if ($st['type'] === 'armor') {
                    if (empty($armors)) {
                        $armors = Armors::where('id', $st['type_id'])->get();
                    } else {
                        $armors = $armors->merge(Armors::where('id', $st['type_id'])->get());
                    }
                } else if ($st['type'] === 'item') {
                    if (empty($items)) {
                        $items = Items::where('id', $st['type_id'])->get();
                    } else {
                        $items = $items->merge(Items::where('id', $st['type_id'])->get());
                    }
                }
            }
        }
        return view('characters.show', ['character' => $character, 'weapons' => $weapons, 'skills' => $skills, 'armors' => $armors, 'items' => $items]);
    }

    public function editCharacter(Request $request): RedirectResponse
    {
        $user = User::find(Auth::id());

        $character = Characters::where('id', $request->input('id'))->first();

        $dv = $request->input('dayvision');
        if ($dv === "on") {
            $dv = 1;
        } else {
            $dv = 0;
        }
        $nv = $request->input('nightvision');
        if ($nv === "on") {
            $nv = 1;
        } else {
            $nv = 0;
        }

        if ($character['user_id'] === $user['id']) {

            if ($request->input('name') === $character['name']) {
                $request->request->remove('name');
            }
            if ($request->input('race') === $character['race']) {
                $request->request->remove('race');
            }
            if ($request->input('class') === $character['class']) {
                $request->request->remove('class');
            }
            if ($request->input('level') === $character['level']) {
                $request->request->remove('level');
            }
            if ($request->input('birthday') === $user['DOB']) {
                $request->request->remove('birthday');
            }
            if ($request->input('image') === $user['image']) {
                $request->request->remove('image');
            }
            if ($request->input('birthplace') === $user['birth_location']) {
                $request->request->remove('birth_location');
            }
            if ($request->input('location') === $character['current_location']) {
                $request->request->remove('current_location');
            }
            if ($request->input('religion') === $character['cult']) {
                $request->request->remove('religion');
            }
            if ($request->input('gender') === $character['gender']) {
                $request->request->remove('gender');
            }
            if ($request->input('weight') === $character['weight']) {
                $request->request->remove('weight');
            }
            if ($request->input('size') === $character['height']) {
                $request->request->remove('size');
            }
            if ($request->input('eye_color') === $character['eye_color']) {
                $request->request->remove('eye_color');
            }
            if ($request->input('hair_color') === $character['hair_color']) {
                $request->request->remove('hair_color');
            }
            if ($request->input('skin_color') === $character['skin_color']) {
                $request->request->remove('skin_color');
            }
            if ($request->input('description') === $character['description']) {
                $request->request->remove('description');
            }
            if ($request->input('maxLife_text') === $character['max_health_point']) {
                $request->request->remove('maxLife_text');
            }
            if ($request->input('currentLife_text') === $character['health_point']) {
                $request->request->remove('currentLife_text');
            }
            if ($request->input('resistance') === $character['resistance']) {
                $request->request->remove('resistance');
            }
            if ($dv === $character['day_vision']) {
                $request->request->remove('dayvision');
            }
            if ($nv === $character['night_vision']) {
                $request->request->remove('nightvision');
            }
            if ($request->input('otherDescription') === $character['desc_other']) {
                $request->request->remove('otherDescription');
            }
            if ($request->input('h2hAttack_text') === $character['melee_attack']) {
                $request->request->remove('h2hAttack_text');
            }
            if ($request->input('distanceAttack_text') === $character['dist_attack']) {
                $request->request->remove('distanceAttack_text');
            }
            if ($request->input('magicAttack_text') === $character['magic_attack']) {
                $request->request->remove('magicAttack_text');
            }
            if ($request->input('attackDescription') === $character['desc_attack']) {
                $request->request->remove('attackDescription');
            }
            if ($request->input('h2hDefense_text') === $character['melee_defense']) {
                $request->request->remove('h2hDefense_text');
            }
            if ($request->input('distanceDefense_text') === $character['dist_defense']) {
                $request->request->remove('distanceDefense_text');
            }
            if ($request->input('magicDefense_text') === $character['magic_defense']) {
                $request->request->remove('magicDefense_text');
            }
            if ($request->input('defenseDescription') === $character['desc_defense']) {
                $request->request->remove('defenseDescription');
            }

            $request->validate([
                'name' => ['string', 'max:255'],
                'image' => ['nullable', 'string', 'max:255'],
                'race' => ['nullable', 'string', 'max:255'],
                'class' => ['nullable', 'string', 'max:255'],
                'level' => ['nullable', 'integer', 'max:2147483647'],
                'birthday' => ['nullable', 'string', 'max:255'],
                'birthplace' => ['nullable', 'string', 'max:255'],
                'location' => ['nullable', 'string', 'max:255'],
                'religion' => ['nullable', 'string', 'max:255'],
                'gender' => ['nullable', 'string', 'max:255'],
                'weight' => ['nullable', 'integer', 'max:2147483647'],
                'size' => ['nullable', 'integer', 'max:2147483647'],
                'eye_color' => ['nullable', 'string', 'max:255'],
                'hair_color' => ['nullable', 'string', 'max:255'],
                'skin_color' => ['nullable', 'string', 'max:255'],
                'description' => ['nullable', 'string', 'max:511'],
                'strength_text' => ['nullable', 'integer', 'max:127'],
                'dexterity_text' => ['nullable', 'integer', 'max:127'],
                'constitution_text' => ['nullable', 'integer', 'max:127'],
                'intelligence_text' => ['nullable', 'integer', 'max:127'],
                'charisma_text' => ['nullable', 'integer', 'max:127'],
                'wisdom_text' => ['nullable', 'integer', 'max:127'],
                'maxLife_text' => ['nullable', 'integer', 'max:127'],
                'currentLife_text' => ['nullable', 'integer', 'max:127'],
                'speed_text' => ['nullable', 'integer', 'max:127'],
                'resistance' => ['nullable', 'string', 'max:255'],
                'dayVision' => ['nullable', 'boolean', 'max:1'],
                'nightVision' => ['nullable', 'boolean', 'max:1'],
                'otherDescription' => ['nullable', 'string', 'max:511'],
                'h2hAttack_text' => ['nullable', 'integer', 'max:127'],
                'distanceAttack_text' => ['nullable', 'integer', 'max:127'],
                'magicAttack_text' => ['nullable', 'integer', 'max:127'],
                'attackDescription' => ['nullable', 'string', 'max:511'],
                'h2hDefense_text' => ['nullable', 'integer', 'max:127'],
                'distanceDefense_text' => ['nullable', 'integer', 'max:127'],
                'magicDefense_text' => ['nullable', 'integer', 'max:127'],
                'defenseDescription' => ['nullable', 'string', 'max:511'],

                'weapon.*' => ['nullable', 'array', 'max:15'],
                'weapon.name.*' => ['nullable', 'string', 'max:255'],
                'weapon.range.*' => ['nullable', 'integer', 'max:2047'],
                'weapon.damage.*' => ['nullable', 'integer', 'max:2047'],
                'weapon.weight.*' => ['nullable', 'integer', 'max:2047'],
                'weapon.desc.*' => ['nullable', 'string'],

                'skill.*' => ['nullable', 'array', 'max:15'],
                'skill.name.*' => ['nullable', 'string', 'max:255'],
                'skill.desc.*' => ['nullable', 'string'],
                'skill.value.*' => ['nullable', 'integer', 'max:2047'],

                'item.*' => ['nullable', 'array', 'max:15'],
                'item.name.*' => ['nullable', 'string', 'max:255'],
                'item.desc.*' => ['nullable', 'string'],
                'item.weight.*' => ['nullable', 'integer', 'max:2047'],

                'armor.*' => ['nullable', 'array', 'max:15'],
                'armor.name.*' => ['nullable', 'string', 'max:255'],
                'armor.resistance.*' => ['nullable', 'integer', 'max:2047'],
                'armor.desc.*' => ['nullable', 'string'],
                'armor.weight.*' => ['nullable', 'integer', 'max:2047'],
            ]);

            Characters::where('id', $character['id'])->update([
                'name' => ($request->input('name') ?? $character['name']),
                'description' => ($request->input('description') ?? $character['description']),
                'race' => ($request->input('race') ?? $character['race']),
                'class' => ($request->input('class') ?? $character['class']),
                'level' => ($request->input('level') ?? $character['level']),
                'image' => ($request->input('image') ?? $character['image']),
                'DOB' => ($request->input('birthday') ?? $character['DOB']),
                'max_health_point' => ($request->input('maxLife_text') ?? $character['max_health_point']),
                'health_point' => ($request->input('currentLife_text') ?? $character['health_point']),
                'weight' => ($request->input('weight') ?? $character['weight']),
                'height' => ($request->input('size') ?? $character['height']),
                'gender' => ($request->input('gender') ?? $character['gender']),
                'skin_color' => ($request->input('skin_color') ?? $character['skin_color']),
                'eye_color' => ($request->input('eye_color') ?? $character['eye_color']),
                'hair_color' => ($request->input('hair_color') ?? $character['hair_color']),
                'melee_attack' => ($request->input('h2hAttack_text') ?? $character['melee_attack']),
                'dist_attack' => ($request->input('distanceAttack_text') ?? $character['dist_attack']),
                'magic_attack' => ($request->input('magicAttack_text') ?? $character['magic_attack']),
                'desc_attack' => ($request->input('attackDescription') ?? $character['desc_attack']),
                'melee_defense' => ($request->input('h2hDefense_text') ?? $character['melee_defense']),
                'dist_defense' => ($request->input('distanceDefense_text') ?? $character['dist_defense']),
                'magic_defense' => ($request->input('magicDefense_text') ?? $character['magic_defense']),
                'desc_defense' => ($request->input('defenseDescription') ?? $character['desc_defense']),
                'day_vision' => ($dv),
                'night_vision' => ($nv),
                'resistance' => ($request->input('resistance') ?? $character['resistance']),
                'desc_other' => ($request->input('otherDescription') ?? $character['desc_other']),
                'current_location' => ($request->input('location') ?? $character['current_location']),
                'birth_location' => ($request->input('birthplace') ?? $character['birth_location']),
                'cult' => ($request->input('religion') ?? $character['cult']),
            ]);

            Characteristics::where('id', $character['characteristic_id'])->update([
                'strength' => ($request->input('strength_text') ?? $character['strength']),
                'dexterity' => ($request->input('dexterity_text') ?? $character['dexterity']),
                'speed' => ($request->input('speed_text') ?? $character['speed']),
                'constitution' => ($request->input('constitution_text') ?? $character['constitution']),
                'intelligence' => ($request->input('intelligence_text') ?? $character['intelligence']),
                'wisdom' => ($request->input('wisdom_text') ?? $character['wisdom']),
                'charisma' => ($request->input('charisma_text') ?? $character['charisma']),
            ]);

            $weapons = $request->input('weapon');
            $skills = $request->input('skill');
            $armors = $request->input('armor');
            $items = $request->input('item');

            if ($weapons !== null) {
                for ($i = 0, $iMax = count($weapons['name']); $i < $iMax; $i++) {
                    Weapons::where('id', $weapons['id'][$i])->update([
                        'name' => ($weapons['name'][$i]),
                        'range' => ($weapons['range'][$i]),
                        'damage' => ($weapons['damage'][$i]),
                        'weight' => ($weapons['weight'][$i]),
                        'description' => ($weapons['desc'][$i]),
                    ]);
                }
            }

            if ($skills !== null) {
                for ($i = 0, $iMax = count($skills['name']); $i < $iMax; $i++) {
                    Skills::where('id', $skills['id'][$i])->update([
                        'name' => ($skills['name'][$i]),
                        'value' => ($skills['damage'][$i]),
                        'description' => ($skills['desc'][$i]),
                    ]);
                }
            }

            if ($armors !== null) {
                for ($i = 0, $iMax = count($armors['name']); $i < $iMax; $i++) {
                    Armors::where('id', $armors['id'][$i])->update([
                        'name' => ($armors['name'][$i]),
                        'resistance' => ($armors['protection'][$i]),
                        'weight' => ($armors['weight'][$i]),
                        'description' => ($armors['desc'][$i]),
                    ]);
                }
            }

            if ($items !== null) {
                for ($i = 0, $iMax = count($items['name']); $i < $iMax; $i++) {
                    Items::where('id', $items['id'][$i])->update([
                        'name' => ($items['name'][$i]),
                        'weight' => ($items['weight'][$i]),
                        'description' => ($items['desc'][$i]),
                    ]);
                }
            }

        }
        return redirect()->route('listCharacter');
    }


    public function list()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $characters = Characters::where('user_id', Auth::id())->get();
        $user = User::find(Auth::id());
        return view('characters.list', ['characters' => $characters, 'user' => $user]);
    }

    public function listPlayer($slug)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        if (str_contains($slug, '.')) {
            $term_uid = explode(".", $slug)[count(explode(".", $slug)) - 1];
            if (User::where('id', $term_uid)->count() > 0) {
                $characters = Characters::where('user_id', $term_uid)->get();
                $user = User::find(Auth::id());
                return view('characters.list', ['characters' => $characters, 'user' => $user]);
            }
        }

        return redirect(route('listCharacter'));
    }

    public function addStuffRequest(Request $request)
    {
        $type = $request->input('type');
        $character = Characters::where('id', $request->input('id'))->first();
        if ($type === "skill") {
            $skill = $request->input('skill');
            $name = $skill['name'][0];
            $value = $skill['damage'][0];
            $desc = $skill['desc'][0];
            $idForStuff = Skills::insertGetId([
                'name' => $name,
                'value' => $value,
                'description' => $desc
            ]);
            $idForStuffsID = Stuffs::insertGetId([
                'type' => 'skill',
                'type_id' => $idForStuff
            ]);
            $stuffsID = $character['stuffs_id'];
            if (strlen($stuffsID) === 4) {
                $stuffsID = "[\"" . $idForStuffsID . "\"]";
            } else {
                $stuffsID = substr($stuffsID, 0, -2) . "," . $idForStuffsID . "\"]";
            }
            Characters::where('id', $request->input('id'))->update([
                'stuffs_id' => $stuffsID
            ]);
        } else if ($type === "weapon") {
            $weapon = $request->input('weapon');
            $name = $weapon['name'][0];
            $range = $weapon['range'][0];
            $damage = $weapon['damage'][0];
            $weight = $weapon['weight'][0];
            $desc = $weapon['desc'][0];
            $idForStuff = Weapons::insertGetId([
                'name' => $name,
                'range' => $range,
                'damage' => $damage,
                'weight' => $weight,
                'description' => $desc
            ]);
            $idForStuffsID = Stuffs::insertGetId([
                'type' => 'weapon',
                'type_id' => $idForStuff
            ]);
            $stuffsID = $character['stuffs_id'];
            if (strlen($stuffsID) === 4) {
                $stuffsID = "[\"" . $idForStuffsID . "\"]";
            } else {
                $stuffsID = substr($stuffsID, 0, -2) . "," . $idForStuffsID . "\"]";
            }
            Characters::where('id', $request->input('id'))->update([
                'stuffs_id' => $stuffsID
            ]);
        } else if ($type === "armor") {
            $armor = $request->input('armor');
            $name = $armor['name'][0];
            $resistance = $armor['protection'][0];
            $weight = $armor['weight'][0];
            $desc = $armor['desc'][0];
            $idForStuff = Armors::insertGetId([
                'name' => $name,
                'resistance' => $resistance,
                'weight' => $weight,
                'description' => $desc
            ]);
            $idForStuffsID = Stuffs::insertGetId([
                'type' => 'armor',
                'type_id' => $idForStuff
            ]);
            $stuffsID = $character['stuffs_id'];
            if (strlen($stuffsID) === 4) {
                $stuffsID = "[\"" . $idForStuffsID . "\"]";
            } else {
                $stuffsID = substr($stuffsID, 0, -2) . "," . $idForStuffsID . "\"]";
            }
            Characters::where('id', $request->input('id'))->update([
                'stuffs_id' => $stuffsID
            ]);
        } else if ($type === "item") {
            $item = $request->input('item');
            $name = $item['name'][0];
            $weight = $item['weight'][0];
            $desc = $item['desc'][0];
            $idForStuff = Items::insertGetId([
                'name' => $name,
                'weight' => $weight,
                'description' => $desc
            ]);
            $idForStuffsID = Stuffs::insertGetId([
                'type' => 'item',
                'type_id' => $idForStuff
            ]);
            $stuffsID = $character['stuffs_id'];
            if (strlen($stuffsID) === 4) {
                $stuffsID = "[\"" . $idForStuffsID . "\"]";
            } else {
                $stuffsID = substr($stuffsID, 0, -2) . "," . $idForStuffsID . "\"]";
            }
            Characters::where('id', $request->input('id'))->update([
                'stuffs_id' => $stuffsID
            ]);
        }
        return redirect(route('listCharacter'));
    }

    public function addStuff($id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $character = Characters::where('id', $id)->first();
        if ($character['user_id'] === Auth::id()) {
            return view('characters.addStuff', ['character' => $character]);
        }
        return redirect(route('listCharacter'));
    }

    public function deleteStuffRequest(Request $request): void
    {
        $character = Characters::where('id', $request->input('character_id'))->first();
        $stuffs = substr($character['stuffs_id'], 2, -2);
        $stuff_array = explode(',', $stuffs);
        $type = $request->input('stuff_type');
        $id = $request->input('stuff_id');
        $stuff = Stuffs::where([['type', $type], ['type_id', $id]])->first();
        $stuffTableID = $stuff['id'];
        if (($key = array_search($stuffTableID, $stuff_array, true)) !== false) {
            unset($stuff_array[$key]);
        }
        Stuffs::where([['type', $type], ['type_id', $id]])->delete();
        if ($type === 'skill') {
            Skills::where('id', $id)->delete();
        }
        if ($type === 'weapon') {
            Weapons::where('id', $id)->delete();
        }
        if ($type === 'armor') {
            Armors::where('id', $id)->delete();
        }
        if ($type === 'item') {
            Items::where('id', $id)->delete();
        }
        Characters::where('id', $request->input('character_id'))->update([
            'stuffs_id' => "[\"" . implode(",", $stuff_array) . "\"]"
        ]);
    }

    public function deleteStuff($id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $character = Characters::where('id', $id)->first();
        try {
            $stuffs = explode(",", json_decode($character['stuffs_id'], true, 512, JSON_THROW_ON_ERROR)[0]);
        } catch (JsonException $e) {
            return $e->getMessage();
        }
        $weapons = [];
        $skills = [];
        $items = [];
        $armors = [];
        if (count($stuffs) > 0 && $stuffs[0] !== "") {
            foreach ($stuffs as $s) {
                $st = Stuffs::where('id', $s)->first();
                if ($st['type'] === 'weapon') {
                    if (empty($weapons)) {
                        $weapons = Weapons::where('id', $st['type_id'])->get();
                    } else {
                        $weapons = $weapons->merge(Weapons::where('id', $st['type_id'])->get());
                    }
                } else if ($st['type'] === 'skill') {
                    if (empty($skills)) {
                        $skills = Skills::where('id', $st['type_id'])->get();
                    } else {
                        $skills = $skills->merge(Skills::where('id', $st['type_id'])->get());
                    }
                } else if ($st['type'] === 'armor') {
                    if (empty($armors)) {
                        $armors = Armors::where('id', $st['type_id'])->get();
                    } else {
                        $armors = $armors->merge(Armors::where('id', $st['type_id'])->get());
                    }
                } else if ($st['type'] === 'item') {
                    if (empty($items)) {
                        $items = Items::where('id', $st['type_id'])->get();
                    } else {
                        $items = $items->merge(Items::where('id', $st['type_id'])->get());
                    }
                }
            }
        }
        if ($character['user_id'] === Auth::id()) {
            return view('characters.deleteStuff', ['character' => $character, 'weapons' => $weapons, 'skills' => $skills, 'armors' => $armors, 'items' => $items]);
        }
        return redirect(route('listCharacter'));
    }

    public function help()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        return view('characters.help');
    }

    public function deleteCharacter(Request $request)
    {
        $uid = Auth::id();
        $cid = $request->input("char_id");
        $char = Characters::where('id', $cid)->first();
        if ($char['user_id'] === $uid) {
            try {
                $stuffs = explode(",", json_decode($char['stuffs_id'], true, 512, JSON_THROW_ON_ERROR)[0]);
            } catch (JsonException $e) {
                return $e->getMessage();
            }
            $weapons = [];
            $skills = [];
            $items = [];
            $armors = [];
            if (count($stuffs) > 0 && $stuffs[0] !== "") {
                foreach ($stuffs as $s) {
                    $st = Stuffs::where('id', $s)->first();
                    if ($st['type'] === 'weapon') {
                        if (empty($weapons)) {
                            $weapons = Weapons::where('id', $st['type_id'])->get();
                        } else {
                            $weapons = $weapons->merge(Weapons::where('id', $st['type_id'])->get());
                        }
                    } else if ($st['type'] === 'skill') {
                        if (empty($skills)) {
                            $skills = Skills::where('id', $st['type_id'])->get();
                        } else {
                            $skills = $skills->merge(Skills::where('id', $st['type_id'])->get());
                        }
                    } else if ($st['type'] === 'armor') {
                        if (empty($armors)) {
                            $armors = Armors::where('id', $st['type_id'])->get();
                        } else {
                            $armors = $armors->merge(Armors::where('id', $st['type_id'])->get());
                        }
                    } else if ($st['type'] === 'item') {
                        if (empty($items)) {
                            $items = Items::where('id', $st['type_id'])->get();
                        } else {
                            $items = $items->merge(Items::where('id', $st['type_id'])->get());
                        }
                    }
                }
                foreach ($stuffs as $s) {
                    Stuffs::where('id', $s)->delete();
                }
            }
            foreach ($skills as $s) {
                Skills::where('id', $s['id'])->delete();
            }
            foreach ($weapons as $w) {
                Weapons::where('id', $w['id'])->delete();
            }
            foreach ($armors as $a) {
                Armors::where('id', $a['id'])->delete();
            }
            foreach ($items as $i) {
                Items::where('id', $i['id'])->delete();
            }
            Characters::where('id', $cid)->delete();
        }
        return redirect(route('home'));
    }

    public function newCharacter(Request $request): string
    {
        $request->validate([
            'name' => ['string', 'max:255'],
            'image' => ['nullable', 'string', 'max:255'],
            'race' => ['nullable', 'string', 'max:255'],
            'class' => ['nullable', 'string', 'max:255'],
            'level' => ['nullable', 'integer', 'max:2147483647'],
            'birthday' => ['nullable', 'string', 'max:255'],
            'birthplace' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'religion' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', 'string', 'max:255'],
            'weight' => ['nullable', 'integer', 'max:2147483647'],
            'size' => ['nullable', 'integer', 'max:2147483647'],
            'eye_color' => ['nullable', 'string', 'max:255'],
            'hair_color' => ['nullable', 'string', 'max:255'],
            'skin_color' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:511'],
            'strength_text' => ['nullable', 'integer', 'max:127'],
            'dexterity_text' => ['nullable', 'integer', 'max:127'],
            'constitution_text' => ['nullable', 'integer', 'max:127'],
            'intelligence_text' => ['nullable', 'integer', 'max:127'],
            'charisma_text' => ['nullable', 'integer', 'max:127'],
            'wisdom_text' => ['nullable', 'integer', 'max:127'],
            'maxLife_text' => ['nullable', 'integer', 'max:127'],
            'currentLife_text' => ['nullable', 'integer', 'max:127'],
            'speed_text' => ['nullable', 'integer', 'max:127'],
            'resistance' => ['nullable', 'string', 'max:255'],
            'dayVision' => ['nullable', 'boolean', 'max:1'],
            'nightVision' => ['nullable', 'boolean', 'max:1'],
            'otherDescription' => ['nullable', 'string', 'max:511'],
            'h2hAttack_text' => ['nullable', 'integer', 'max:127'],
            'distanceAttack_text' => ['nullable', 'integer', 'max:127'],
            'magicAttack_text' => ['nullable', 'integer', 'max:127'],
            'attackDescription' => ['nullable', 'string', 'max:511'],
            'h2hDefense_text' => ['nullable', 'integer', 'max:127'],
            'distanceDefense_text' => ['nullable', 'integer', 'max:127'],
            'magicDefense_text' => ['nullable', 'integer', 'max:127'],
            'defenseDescription' => ['nullable', 'string', 'max:511'],

            'weapon.*' => ['nullable', 'array', 'max:15'],
            'weapon.name.*' => ['nullable', 'string', 'max:255'],
            'weapon.range.*' => ['nullable', 'integer', 'max:2047'],
            'weapon.damage.*' => ['nullable', 'integer', 'max:2047'],
            'weapon.weight.*' => ['nullable', 'integer', 'max:2047'],
            'weapon.desc.*' => ['nullable', 'string'],

            'skill.*' => ['nullable', 'array', 'max:15'],
            'skill.name.*' => ['nullable', 'string', 'max:255'],
            'skill.desc.*' => ['nullable', 'string'],
            'skill.value.*' => ['nullable', 'integer', 'max:2047'],

            'item.*' => ['nullable', 'array', 'max:15'],
            'item.name.*' => ['nullable', 'string', 'max:255'],
            'item.desc.*' => ['nullable', 'string'],
            'item.weight.*' => ['nullable', 'integer', 'max:2047'],

            'armor.*' => ['nullable', 'array', 'max:15'],
            'armor.name.*' => ['nullable', 'string', 'max:255'],
            'armor.resistance.*' => ['nullable', 'integer', 'max:2047'],
            'armor.desc.*' => ['nullable', 'string'],
            'armor.weight.*' => ['nullable', 'integer', 'max:2047'],
        ]);

        $dv = $request->input('dayvision');
        if ($dv === "on") {
            $dv = 1;
        } else {
            $dv = 0;
        }
        $nv = $request->input('nightvision');
        if ($nv === "on") {
            $nv = 1;
        } else {
            $nv = 0;
        }

        try {
            Characters::firstOrCreate([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'DOB' => $request->input('birthday'),
                'image' => $request->input('image'),
                'level' => $request->input('level'),
                'max_health_point' => $request->input('maxLife_text'),
                'health_point' => $request->input('currentLife_text'),
                'weight' => $request->input('weight'),
                'height' => $request->input('size'),
                'gender' => $request->input('gender'),
                'eye_color' => $request->input('eye_color'),
                'hair_color' => $request->input('hair_color'),
                'skin_color' => $request->input('skin_color'),


                'melee_attack' => $request->input('h2hAttack_text'),
                'dist_attack' => $request->input('distanceAttack_text'),
                'magic_attack' => $request->input('magicAttack_text'),
                'desc_attack' => $request->input('attackDescription'),
                'melee_defense' => $request->input('h2hDefense_text'),
                'dist_defense' => $request->input('distanceDefense_text'),
                'magic_defense' => $request->input('magicDefense_text'),
                'desc_defense' => $request->input('defenseDescription'),
                'day_vision' => $dv,
                'night_vision' => $nv,
                'resistance' => $request->input('resistance'),
                'desc_other' => $request->input('otherDescription'),
                'class' => $request->input('class'),
                'birth_location' => $request->input('birthplace'),
                'current_location' => $request->input('location'),
                'race' => $request->input('race'),
                'cult' => $request->input('religion'),

                'user_id' => Auth::id(),
                'characteristic_id' => $this->createCharacteristics(
                    $request->input('strength_text'),
                    $request->input('dexterity_text'),
                    $request->input('constitution_text'),
                    $request->input('intelligence_text'),
                    $request->input('wisdom_text'),
                    $request->input('charisma_text'),
                    $request->input('speed_text')
                ),
                'stuffs_id' => $this->createStuffs($request->input('weapon'),
                    $request->input('skill'),
                    $request->input('armor'),
                    $request->input('item'))
            ]);
        } catch (JsonException $e) {
            return $e->getMessage();
        }

        return redirect()->route('listCharacter');
    }

    protected function createCharacteristics($str, $dex, $cst, $int, $wis, $char, $spd): int
    {
        return Characteristics::insertGetId([
            'strength' => $str,
            'dexterity' => $dex,
            'constitution' => $cst,
            'intelligence' => $int,
            'wisdom' => $wis,
            'charisma' => $char,
            'speed' => $spd
        ]);
    }

    protected function createStuffs($weapons, $skills, $armors, $items): string
    {
        $id = '';
        if (count($weapons) > 1) {
            for ($i = 0, $iMax = count($weapons['name']); $i < $iMax; $i++) {
                if (!($weapons['name'][$i] === null && $weapons['range'][$i] === null && $weapons['damage'][$i] === null && $weapons['weight'][$i] === null && $weapons['desc'][$i] === null)) {
                    // ^ vérifie que la ligne entière n'est pas vide
                    $temp = $this->createWeapon($weapons['name'][$i], $weapons['range'][$i], $weapons['damage'][$i], $weapons['weight'][$i], $weapons['desc'][$i]);
                    $id .= Stuffs::insertGetId([
                            'type' => 'weapon',
                            'type_id' => $temp,
                        ]) . ',';
                }
            }
        }


        if (count($skills) > 1) {
            for ($i = 0, $iMax = count($skills['name']); $i < $iMax; $i++) {
                if (!($skills['name'][$i] === null && $skills['damage'][$i] === null && $skills['desc'][$i] === null)) {
                    $temp = $this->createSkill($skills['name'][$i], $skills['damage'][$i], $skills['desc'][$i]);
                    $id .= Stuffs::insertGetId([
                            'type' => 'skill',
                            'type_id' => $temp,
                        ]) . ',';
                }
            }
        }

        if (count($armors) > 1) {
            for ($i = 0, $iMax = count($armors['name']); $i < $iMax; $i++) {
                if (!($armors['name'][$i] === null && $armors['protection'][$i] === null && $armors['weight'][$i] === null && $armors['desc'][$i] === null)) {
                    $temp = $this->createArmor($armors['name'][$i], $armors['protection'][$i], $armors['weight'][$i], $armors['desc'][$i]);
                    $id .= Stuffs::insertGetId([
                            'type' => 'armor',
                            'type_id' => $temp,
                        ]) . ',';
                }
            }
        }

        if (count($items) > 1) {
            for ($i = 0, $iMax = count($items['name']); $i < $iMax; $i++) {
                if (!($items['name'][$i] === null && $items['weight'][$i] === null && $items['desc'][$i] === null)) {
                    $temp = $this->createItem($items['name'][$i], $items['weight'][$i], $items['desc'][$i]);
                    $id .= Stuffs::insertGetId([
                            'type' => 'item',
                            'type_id' => $temp,
                        ]) . ',';
                }
            }
        }
        try {
            return json_encode(explode(",", substr($id, 0, -1), true), JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            return $e->getMessage();
        }
    }

    protected function createWeapon($name, $range, $damage, $weight, $desc): int
    {
        return Weapons::insertGetId([
            'name' => $name,
            'range' => $range,
            'damage' => $damage,
            'weight' => $weight,
            'description' => $desc
        ]);
    }

    protected function createSkill($name, $value, $desc): int
    {
        return Skills::insertGetId([
            'name' => $name,
            'value' => $value,
            'description' => $desc
        ]);
    }

    protected function createArmor($name, $protection, $weight, $desc): int
    {
        return Armors::insertGetId([
            'name' => $name,
            'resistance' => $protection,
            'weight' => $weight,
            'description' => $desc
        ]);
    }

    protected function createItem($name, $weight, $desc): int
    {
        return Items::insertGetId([
            'name' => $name,
            'weight' => $weight,
            'description' => $desc
        ]);
    }

    protected function exportCharacter(Request $request): string
    {
        $cid = $request->input("char_id");
        $response = Characters::find($cid)->toArray();
        $response['stuff'] = array(
            'weapons' => ['name' => []],
            'items' => [],
            'armors' => [],
            'skills' => []
        );
        try {
            $stuffPlain = explode(',', json_decode($response['stuffs_id'], true, 512, JSON_THROW_ON_ERROR)[0]);
        } catch (JsonException $e) {
            return $e->getMessage();
        }
        //dd($stuffPlain);
        if (count($stuffPlain) > 0 && $stuffPlain[0] !== "") { //le json renvoie forcément un tableau, qui peut etre vide
            foreach ($stuffPlain as $id) {
                $s_type = Stuffs::where('id', $id)->first()['type'];
                $s_id = Stuffs::where('id', $id)->first()['type_id'];
                switch ($s_type) {
                    case 'weapon':
                        $req = Weapons::find($s_id)->toArray();
                        $response['stuff']['weapons']['name'][] = $req['name'];
                        $response['stuff']['weapons']['damage'][] = $req['damage'];
                        $response['stuff']['weapons']['weight'][] = $req['weight'];
                        $response['stuff']['weapons']['range'][] = $req['range'];
                        $response['stuff']['weapons']['desc'][] = $req['description'];
                        break;
                    case 'item':
                        $req = Items::find($s_id)->toArray();
                        $response['stuff']['items']['name'][] = $req['name'];
                        $response['stuff']['items']['weight'][] = $req['weight'];
                        $response['stuff']['items']['desc'][] = $req['description'];
                        break;
                    case 'armor':
                        $req = Armors::find($s_id)->toArray();
                        $response['stuff']['armors']['name'][] = $req['name'];
                        $response['stuff']['armors']['protection'][] = $req['resistance'];
                        $response['stuff']['armors']['weight'][] = $req['weight'];
                        $response['stuff']['armors']['desc'][] = $req['description'];
                        break;
                    case 'skill':
                        $req = Skills::find($s_id)->toArray();
                        $response['stuff']['skills']['name'][] = $req['name'];
                        $response['stuff']['skills']['damage'][] = $req['value'];
                        $response['stuff']['skills']['desc'][] = $req['description'];
                        break;
                }
            }
        }
        $cara_id = Characters::where('id', $cid)->first()['characteristic_id'];
        $response['characteristics'] = Characteristics::where('id', $cara_id)->first()->toArray();
        unset($response['characteristics']['created_at'], $response['characteristics']['updated_at'], $response['characteristics']['id'], $response['user_id'], $response['stuffs_id'], $response['skills_id'], $response['id'], $response['created_at'], $response['updated_at'], $response['characteristic_id']);

        try {
            return Crypt::encryptString(json_encode($response, JSON_THROW_ON_ERROR));
        } catch (JsonException $e) {
            return $e->getMessage();
        }

    }

    protected function importCharacter(Request $request)
    {
        try {
            $response = json_decode(Crypt::decryptString($request->input('encryptedJson')), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            return $e->getMessage();
        }

        // on considère le json déjà validé
        Characters::firstOrCreate([
            'name' => $response['name'],
            'description' => $response['description'],
            'DOB' => $response['DOB'],
            'image' => $response['image'],
            'level' => $response['level'],
            'max_health_point' => $response['max_health_point'],
            'health_point' => $response['health_point'],
            'weight' => $response['weight'],
            'height' => $response['height'],
            'gender' => $response['gender'],
            'eye_color' => $response['eye_color'],
            'hair_color' => $response['hair_color'],
            'skin_color' => $response['skin_color'],


            'melee_attack' => $response['melee_attack'],
            'dist_attack' => $response['dist_attack'],
            'magic_attack' => $response['magic_attack'],
            'desc_attack' => $response['desc_attack'],
            'melee_defense' => $response['melee_attack'],
            'dist_defense' => $response['dist_defense'],
            'magic_defense' => $response['magic_defense'],
            'desc_defense' => $response['desc_defense'],
            'day_vision' => $response['day_vision'],
            'night_vision' => $response['night_vision'],
            'resistance' => $response['resistance'],
            'desc_other' => $response['desc_other'],
            'class' => $response['class'],
            'birth_location' => $response['birth_location'],
            'current_location' => $response['current_location'],
            'race' => $response['race'],
            'cult' => $response['cult'],

            'user_id' => Auth::id(),
            'characteristic_id' => $this->createCharacteristics(
                $response['characteristics']['strength'],
                $response['characteristics']['dexterity'],
                $response['characteristics']['constitution'],
                $response['characteristics']['intelligence'],
                $response['characteristics']['wisdom'],
                $response['characteristics']['charisma'],
                $response['characteristics']['speed']
            ),
            'stuffs_id' => $this->createStuffs($response['stuff']['weapons'],
                $response['stuff']['skills'],
                $response['stuff']['armors'],
                $response['stuff']['items'])
        ]);

        return redirect(route('listCharacter'));
    }
}
