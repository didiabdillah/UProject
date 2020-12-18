<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Project;
use App\Models\History;

class ProjectHistoryController extends Controller
{
    //History List
    public function index($project_id)
    {
        //Project Detail
        $data["project"] = Project::firstWhere('project_id', $project_id);

        //History List
        $history = History::where('history_project_id', $project_id)->orderBy('history_id', 'desc')->get();

        return view('project_history.project_history', ['data' => $data, 'history' => $history]);
    }
}
