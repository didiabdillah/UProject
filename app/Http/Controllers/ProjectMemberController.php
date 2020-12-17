<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Project;
use App\Models\User;
use App\Models\Member;

class ProjectMemberController extends Controller
{
    //Member List
    public function index($project_id)
    {
        //Project Detail
        $data["project"] = Project::firstWhere('project_id', $project_id);

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

        return view('project_member.project_member', ['data' => $data]);
    }

    //Add Member 
    public function add($project_id)
    {
        //Project Detail
        $data["project"] = Project::firstWhere('project_id', $project_id);

        //Member List
        $members = User::where('user_id', '!=', Session::get('user_id'))->get();

        return view('project_member.project_member_add', ['data' => $data, 'members' => $members, 'project_id' => $project_id]);
    }

    //Add Member Process
    public function store($project_id, Request $request)
    {

        foreach ($request->member as $member) {
            $data = [
                'member_user_id' => $member,
                'member_project_id' => $project_id,
                'member_role' => 'member',
                'member_status' => 'active'
            ];

            Member::create($data);
        }

        //Back To Project member
        return redirect()->route('project_member', $project_id);
    }
}
