<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    //Project List
    public function index()
    {
        //Project List
        $project = DB::table('projects')
            ->join('members', 'projects.project_id', '=', 'members.member_project_id')
            ->where('member_user_id', Session::get('user_id'))
            ->get();

        //Task List
        $task = DB::table('projects')
            ->join('members', 'projects.project_id', '=', 'members.member_project_id')
            ->join('tasks', 'projects.project_id', '=', 'tasks.task_project_id')
            ->where('member_user_id', Session::get('user_id'))
            ->get();


        $data["project"] = $project;
        $data["task"] = $task;

        return view('project.project', ['data' => $data]);
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
        //Project List
        $data["project"] = DB::table('projects')
            ->where('project_id', $project_id)
            ->first();

        //Task List
        $data["task"] = DB::table('tasks')
            ->join('projects', 'tasks.task_project_id', '=', 'projects.project_id')
            ->where('project_id', $project_id)
            ->get();

        //Member List
        $data["member"] = DB::table('members')
            ->join('users', 'members.member_user_id', '=', 'users.user_id')
            ->where('member_project_id', $project_id)
            ->get();

        //Member Count
        $data["member_count"] = DB::table('members')
            ->join('users', 'members.member_user_id', '=', 'users.user_id')
            ->where('member_project_id', $project_id)
            ->count();


        return view('project.project_detail', compact('data'));
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
