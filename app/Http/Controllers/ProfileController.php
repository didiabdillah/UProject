<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class ProfileController extends Controller
{
    public function index($user_id)
    {
        $user = User::firstWhere('user_id', $user_id);

        return view('profile.profile', ['user' => $user]);
    }

    public function setting($user_id)
    {
        return view('profile.setting');
    }
}
