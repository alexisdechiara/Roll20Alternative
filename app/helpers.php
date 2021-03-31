<?php


use App\Models\Parties;
use App\Models\Players;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getUser')) {
    function getUser($id, $attr)
    {
        $user = User::where('id', $id)->first();
        if ($user !== null) {
            return $attr !== null ? ($user[$attr]) : $user;
        }
        return null;
    }
}

if (!function_exists('inParty')) {
    function inParty($party, $user): bool
    {
        $pid = $party['id'];
        $uid = $user['id'];
        $player = Players::where('party_id', $pid)->where('user_id', $uid)->first();
        return $player !== null;
    }
}

if (!function_exists('userSlug')) {
    function userSlug($user): string
    {
        return strtolower('@' . $user['username'] . '#' . $user['id']);
    }
}

if (!function_exists('isGM')) {
    function isGM($party_id): string
    {
        return Parties::where('id', $party_id)->where('user_id', Auth::id())->count() > 0;
    }
}
