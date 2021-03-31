<?php


namespace App\Http\Controllers;


use App\Models\Armors;
use App\Models\Characters;
use App\Models\Items;
use App\Models\Parties;
use App\Models\Skills;
use App\Models\User;
use App\Models\Weapons;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function home()
    {
        if (!Auth::check() || !Auth::user()['administrator']) {
            return redirect(route('home'));
        }

        return view('admin.home', [
            'user' => Auth::user(),
            'users' => User::count(),
            'parties' => Parties::count(),
            'characters' => Characters::count(),
            'skills' => Skills::count(),
            'weapons' => Weapons::count(),
            'armors' => Armors::count(),
            'items' => Items::count(),
            'last_users' => User::orderBy('created_at', 'asc')->take(5)->get(),
            'last_parties' => Parties::orderBy('created_at', 'asc')->take(5)->get(),
        ]);
    }

    public function users()
    {
        if (!Auth::check() || !Auth::user()['administrator']) {
            return redirect(route('home'));
        }
        return view('admin.users', [
            'users' => User::get(),
        ]);
    }

    public function parties()
    {
        if (!Auth::check() || !Auth::user()['administrator']) {
            return redirect(route('home'));
        }
        return view('admin.parties', [
            'parties' => Parties::get(),
        ]);
    }

    public function characters()
    {
        if (!Auth::check() || !Auth::user()['administrator']) {
            return redirect(route('home'));
        }
        return view('admin.characters', [
            'characters' => Characters::get(),
        ]);
    }

}
