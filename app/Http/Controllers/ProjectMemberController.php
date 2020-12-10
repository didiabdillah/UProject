<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Project;

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

        return view('project_member.project_member_add', ['data' => $data]);
    }
}
