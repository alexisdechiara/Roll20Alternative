<?php


namespace App\Http\Controllers;

use App\Models\Parties;
use App\Models\Players;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function home()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = User::find(Auth::id());
        $parties = Parties::where('user_id', $user->id)->get();
        $player_of = Players::where('user_id', $user->id)->get();
        foreach ($player_of as $po) {
            $parties = $parties->merge(Parties::where('id', $po['party_id'])->get());
        }

        return view('profile', ['user' => $user, 'parties' => $parties]);
    }

    public function editProfile(Request $request)
    {
        $user = User::find(Auth::id());

        if (!Hash::check($request->input('current_password'), $user->password)) {
            throw ValidationException::withMessages(['current_password' => "Mot de passe incorrect"]);
        }

        if ($request->input('email') === $user['email']) {
            $request->request->remove('email');
        }
        if ($request->input('username') === $user['username']) {
            $request->request->remove('username');
        }
        if ($request->input('first_name') === $user['first_name']) {
            $request->request->remove('first_name');
        }
        if ($request->input('last_name') === $user['last_name']) {
            $request->request->remove('last_name');
        }
        if ($request->input('localization') === $user['localization']) {
            $request->request->remove('localization');
        }
        if ($request->input('profile_picture') === $user['profile_picture']) {
            $request->request->remove('profile_picture');
        }

        $request->validate([
            'username' => ['nullable', 'string', 'max:255'],
            'profile_picture' => ['nullable', 'string', 'max:255'],
            'localization' => ['nullable', 'string', 'max:255'],
            'first_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        User::where('id', $user->id)->update([
            'username' => ($request->input('username') ?? $user['username']),
            'profile_picture' => ($request->input('profile_picture') ?? $user['profile_picture']),
            'email' => ($request->input('email') ?? $user['email']),
            'first_name' => ($request->input('first_name') ?? $user['first_name']),
            'last_name' => ($request->input('last_name') ?? $user['last_name']),
            'localization' => ($request->input('localization') ?? $user['localization']),
            'password' => (Hash::make($request->input('password')) ?? $user['password']),
        ]);

        return redirect(route('profile'));
    }
}
