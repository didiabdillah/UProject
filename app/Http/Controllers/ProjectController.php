<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

use App\Models\Project;
use App\Models\Member;
use App\Models\History;
use App\Models\User;
use App\Models\Discussion;

class ProjectController extends Controller
{
    //Project List
    public function index()
    {
        //Project List
        $project = Project::whereHas('member', function ($query) {
            $query->where('member_user_id', Session::get('user_id'));
        })->orderBy('project_title', 'asc')->get();

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
            'image'  => 'mimetypes:image/png,image/jpeg,image/gif',
            'date_deadline'  => 'required',
            'time_deadline'  => 'required'
        ]);

        // Retrive File Data
        $file = $request->file('image');

        //Initialize variable
        $project_id = strtotime(now()) . hexdec(uniqid());
        $user_id = $request->session()->get('user_id');
        $title = htmlspecialchars($request->title);
        $desc = htmlspecialchars($request->description);
        $status = ($request->active == 'on') ? 'active' : 'deactive';
        $image = ($file != NULL) ? $file->hashName() : NULL;
        $deadline = htmlspecialchars($request->date_deadline . ' ' . $request->time_deadline);

        //Insert Data Project
        $data = [
            'project_id' => $project_id,
            'project_user_id' => $user_id,
            'project_title' => $title,
            'project_description' => $desc,
            'project_image' => $image,
            'project_status' => $status,
            'project_finish' => 0,
            'project_deadline' => $deadline
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
            foreach ($request->member as $members) {
                $member = htmlspecialchars($members);

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

        //Member List
        $data["member"] = DB::table('members')
            ->join('users', 'members.member_user_id', '=', 'users.user_id')
            ->where('member_project_id', $project_id)
            ->orderBy('users.user_name', 'asc')
            ->get();

        //History List
        $data["history"] = History::where('history_project_id', $project_id)->orderBy('history_id', 'desc')->get();

        //Discussion
        $discuss = Discussion::join('users', 'discussions.discussion_user_id', '=', 'users.user_id')
            ->select('discussions.*', 'users.user_name', 'users.user_image')
            ->where('discussion_project_id', $project_id)
            ->orderBy('discussion_id', 'asc')
            ->get();

        $user_id = Session::get('user_id');

        return view('project.project_detail', ['data' => $data, 'discussion' => $discuss, 'user_id' => $user_id]);
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
