<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

use App\Models\User;

class ErrorController extends Controller
{
    public function not_found()
    {
        return view('error.404_not_found');
    }

    public function forbidden()
    {
        return view('error.403_forbidden');
    }
}
