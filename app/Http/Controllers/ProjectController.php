<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Project;
use App\Models\Member;

class ProjectController extends Controller
{
    //Project List
    public function index()
    {
        //Project List
        $project = DB::table('projects')
            ->join('members', 'projects.project_id', '=', 'members.member_project_id')
            ->where('member_user_id', Session::get('user_id'))
            ->orderBy('projects.project_title', 'ASC')
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

    //Project Add Process
    public function store(Request $request)
    {
        // Input Validation
        $request->validate([
            'title'  => 'required|max:150',
            'description'  => 'max:65500',
            'image'  => 'mimetypes:image/png,image/jpeg,image/gif'
        ]);

        // Retrive File Data
        $file = $request->file('image');

        //Initialize variable
        $user_id = $request->session()->get('user_id');
        $title = htmlspecialchars($request->title);
        $desc = htmlspecialchars($request->description);
        $status = ($request->active == 'on') ? 'active' : 'deactive';
        $image = ($file != NULL) ? $file->hashName() : NULL;

        //Insert Data Project
        $data = [
            'project_user_id' => $user_id,
            'project_title' => $title,
            'project_description' => $desc,
            'project_image' => $image,
            'project_status' => $status,
            'project_finish' => 0
        ];
        $query = Project::create($data);

        //Insert Data Member(As Owner)
        $data = [
            'member_user_id' => $user_id,
            'member_project_id' => $query->project_id,
            'member_role' => 'owner',
            'member_status' => 'active'
        ];
        Member::create($data);

        //Flash Message
        Session::flash('icon', 'success');
        Session::flash('alert', 'Success');
        Session::flash('subalert', 'Project Created');

        //Back To Project
        return redirect()->route('project');
    }


    //Project Detail
    public function detail($project_id)
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

        //Member List
        $data["member"] = DB::table('members')
            ->join('users', 'members.member_user_id', '=', 'users.user_id')
            ->where('member_project_id', $project_id)
            ->orderBy('users.user_name', 'asc')
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
