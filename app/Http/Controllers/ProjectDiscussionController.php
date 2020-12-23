<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Project;
use App\Models\Discussion;

class ProjectDiscussionController extends Controller
{
    //History List
    public function index($project_id)
    {
        //Project Detail
        $data["project"] = Project::firstWhere('project_id', $project_id);

        return view('project_discussion.project_discussion', ['data' => $data]);
    }

    public function store(Request $request, $project_id)
    {
        $message = htmlspecialchars($request->message);
        $user_id = $request->session()->get('user_id');

        $data = [
            'discussion_user_id' => $user_id,
            'discussion_project_id' => $project_id,
            'discussion_message' => $message
        ];
        Discussion::create($data);

        return redirect()->back();
    }
}
