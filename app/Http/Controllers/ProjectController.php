<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //Project List
    public function index()
    {
        return view('project.project');
    }

    //Project Add
    public function insert()
    {
        return view('project.project_add');
    }

    public function store(Request $request)
    {
    }


    //Project Detail
    public function detail($project_id)
    {
        return view('project.project_detail');
    }

    //Project History Detail
    public function history($project_id)
    {
        return view('project.project_history');
    }

    //Project History Member
    public function member($project_id)
    {
        return view('project.project_member');
    }

    //Project History Discussion
    public function discussion($project_id)
    {
        return view('project.project_discussion');
    }

    //Project History Task
    public function task($project_id)
    {
        return view('project.project_task');
    }
}
