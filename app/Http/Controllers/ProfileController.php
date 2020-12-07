<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($user_id)
    {
        return view('profile.profile');
    }

    public function setting($user_id)
    {
        return view('profile.setting');
    }
}
