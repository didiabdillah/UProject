<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use App\Models\Project;
use App\Models\Member;
use App\Models\History;
use App\Models\User;

class ProjectController extends Controller
{
    //Project List
    public function index()
    {
        $project = Project::whereHas('member', function ($query) {
            $query->where('member_user_id', Session::get('user_id'));
        })->orderBy('project_title', 'asc')->get();

        // TEST

        // foreach ($data as $d) {
        //     foreach ($d->task as $t) {
        //         dump($t);
        //     }
        // }
        // die;

        // //Project List
        // $project = DB::table('projects')
        //     ->join('members', 'projects.project_id', '=', 'members.member_project_id')
        //     ->where('member_user_id', Session::get('user_id'))
        //     ->orderBy('projects.project_title', 'ASC')
        //     ->get();

        // //Task List
        // $task = DB::table('projects')
        //     ->join('members', 'projects.project_id', '=', 'members.member_project_id')
        //     ->join('tasks', 'projects.project_id', '=', 'tasks.task_project_id')
        //     ->where('member_user_id', Session::get('user_id'))
        //     ->get();


        // $data["project"] = $project;
        // $data["task"] = $task;

        return view('project.project', ['projects' => $project]);
    }

    //Project Add
    public function insert()
    {
        //Member List
        $members = DB::table("users")->where('user_id', '!=', Session::get('user_id'))->orderBy('user_name', 'asc')->get();

        return view('project.project_add', ['members' => $members]);
    }

    //Project Add Process
    public function store(Request $request)
    {
        // Input Validation
        $request->validate([
            'title'  => 'required|max:150',
            'description'  => 'required|max:65500',
            'image'  => 'mimetypes:image/png,image/jpeg,image/gif'
        ]);

        // Retrive File Data
        $file = $request->file('image');

        //Initialize variable
        $project_id = strtotime(date('Y-m-d H:i:s')) . str_replace('-', '', Str::uuid());
        $user_id = $request->session()->get('user_id');
        $title = htmlspecialchars($request->title);
        $desc = htmlspecialchars($request->description);
        $status = ($request->active == 'on') ? 'active' : 'deactive';
        $image = ($file != NULL) ? $file->hashName() : NULL;

        //Insert Data Project
        $data = [
            'project_id' => $project_id,
            'project_user_id' => $user_id,
            'project_title' => $title,
            'project_description' => $desc,
            'project_image' => $image,
            'project_status' => $status,
            'project_finish' => 0
        ];
        $query = Project::create($data);

        //Insert Data Member(As Owner)
        $member = [
            'member_user_id' => $user_id,
            'member_project_id' => $query->project_id,
            'member_role' => 'owner',
            'member_status' => 'active'
        ];
        Member::create($member);

        //Add To Log History (Owner Created Project)
        insert_history(
            $user_id, //User ID
            $query->project_id, //Project ID
            User::find($user_id)->user_name, //Subject
            __('history.message_create_project'), //Verb
            $title, //Object
            __('history.icon_pencil'), //Icon
            __('history.bg_purple') //Background
        );

        //Insert Data Member
        if ($request->member != NULL) {
            foreach ($request->member as $member) {
                //Insert Data
                $data = [
                    'member_user_id' => $member,
                    'member_project_id' => $query->project_id,
                    'member_role' => 'member',
                    'member_status' => 'active'
                ];
                Member::create($data);

                //Add To Log History (Owner Added Member)
                insert_history(
                    $user_id, //User ID
                    $query->project_id, //Project ID
                    User::find($user_id)->user_name, //Subject
                    __('history.message_add_member'), //Verb
                    User::find($member)->user_name, //Object
                    __('history.icon_user_plus'), //Icon
                    __('history.bg_blue') //Background
                );
            }
        }

        //Flash Message
        flash_alert(
            __('alert.icon_success'), //Icon
            'Success', //Alert Message 
            'Project Created' //Sub Alert Message
        );

        //Back To Project
        return redirect()->route('project');
    }

    //Project Detail
    public function detail($project_id)
    {
        //Project Detail
        $data["project"] = Project::find($project_id);

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
        // $data["task"] = DB::table('tasks')
        //     ->join('projects', 'tasks.task_project_id', '=', 'projects.project_id')
        //     ->where('project_id', $project_id)
        //     ->get();

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

        //History List
        $data["history"] = History::where('history_project_id', $project_id)->orderBy('history_id', 'desc')->get();

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
