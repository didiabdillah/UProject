<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $project = Project::whereHas('member', function ($query) {
            $query->where('member_user_id', Session::get('user_id'));
        })->orderBy('project_title', 'asc')->get();

        return view('home.home', ['projects' => $project]);
    }
}
