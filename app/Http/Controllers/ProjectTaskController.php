<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Project;
use App\Models\User;
use App\Models\Task;

class ProjectTaskController extends Controller
{
    //Task List
    public function index($project_id)
    {
        //Project Detail
        $data["project"] = Project::firstWhere('project_id', $project_id);


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

    public function insert($project_id)
    {
        //Project Detail
        $project = Project::firstWhere('project_id', $project_id);

        //User List
        $users = DB::table("users")->select('*')->whereIn('user_id', function ($query) use ($project_id) {
            $query->select('member_user_id')->from('members')->where('member_project_id', $project_id);
        })->orderBy('user_name', 'asc')->get();

        return view('project_task.project_task_add', ['project' => $project, 'users' => $users]);
    }

    //Add Task Process
    public function store($project_id, Request $request)
    {
        // Input Validation
        $request->validate([
            'title'  => 'required|max:150',
            'date_deadline'  => 'required',
            'time_deadline'  => 'required',
            'user'  => 'required'
        ]);

        //Get User ID From Session
        $user_id = $request->session()->get('user_id');

        //Insert Data
        $data = [
            'task_user_id' => htmlspecialchars($request->user),
            'task_project_id' => $project_id,
            'task_title' => htmlspecialchars($request->title),
            'task_deadline' => htmlspecialchars($request->date_deadline . ' ' . $request->time_deadline),
            'task_status' => ($request->active == 'on') ? 'active' : 'deactive',
            'task_finish' => 0
        ];
        Task::create($data);

        //Add To Log History (Owner Added Member)
        insert_history(
            $user_id, //User ID
            $project_id, //Project ID
            User::find($user_id)->user_name, //Subject
            __('history.message_add_task'), //Verb
            htmlspecialchars($request->title), //Object
            __('history.icon_pencil'), //Icon
            __('history.bg_purple') //Background
        );

        //Flash Message
        flash_alert(
            __('alert.icon_success'), //Icon
            'Add Success', //Alert Message 
            'Project task added' //Sub Alert Message
        );

        //Back To Project member
        return redirect()->route('project_detail', $project_id);
    }
}
