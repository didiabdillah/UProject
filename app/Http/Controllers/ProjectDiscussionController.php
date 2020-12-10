<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProjectDiscussionController extends Controller
{
    //History List
    public function index($project_id)
    {
        //Project Detail
        $data["project"] = DB::table('projects')
            ->where('project_id', $project_id)
            ->first();

        return view('project_discussion.project_discussion', ['data' => $data]);
    }
}
