<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProjectTaskController extends Controller
{
    //History List
    public function index($project_id)
    {
        //Project Detail
        $data["project"] = DB::table('projects')
            ->where('project_id', $project_id)
            ->first();


        //Project Percentage 
        $task_total = DB::table('tasks')
            ->join('projects', 'tasks.task_project_id', '=', 'projects.project_id')
            ->where('project_id', $project_id)
            ->count();

        $task_finish = DB::table('tasks')
            ->join('projects', 'tasks.task_project_id', '=', 'projects.project_id')
            ->where('project_id', $project_id)
            ->where('task_finish', 1)
            ->count();

        if ($task_total > 0) {
            $data["project_percentage"] = (int) ($task_finish * 100 / $task_total);
        } else {
            $data["project_percentage"] = 0;
        }

        //Task List
        $data["task"] = DB::table('tasks')
            ->join('projects', 'tasks.task_project_id', '=', 'projects.project_id')
            ->where('project_id', $project_id)
            ->get();

        return view('project_task.project_task', ['data' => $data]);
    }
}
