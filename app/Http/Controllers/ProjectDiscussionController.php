<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Project;

class ProjectDiscussionController extends Controller
{
    //History List
    public function index($project_id)
    {
        //Project Detail
        $data["project"] = Project::firstWhere('project_id', $project_id);

        return view('project_discussion.project_discussion', ['data' => $data]);
    }
}
