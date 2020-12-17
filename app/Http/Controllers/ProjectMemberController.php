<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Project;
use App\Models\User;
use App\Models\Member;
use App\Models\History;

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

        //Is Owner 
        $owner = Member::where('member_user_id', Session::get('user_id'))
            ->where('member_project_id', $project_id)
            ->first()
            ->member_role;

        return view('project_member.project_member', ['data' => $data, 'project_id' => $project_id, 'owner' => $owner]);
    }

    //Add Member 
    public function add($project_id)
    {
        //Project Detail
        $data["project"] = Project::firstWhere('project_id', $project_id);

        //Member List
        $members = DB::table("users")->select('*')->whereNotIn('user_id', function ($query) use ($project_id) {
            $query->select('member_user_id')->from('members')->where('member_project_id', $project_id);
        })->get();

        return view('project_member.project_member_add', ['data' => $data, 'members' => $members, 'project_id' => $project_id]);
    }

    //Add Member Process
    public function store($project_id, Request $request)
    {
        // Input Validation
        $request->validate([
            'member'  => 'required'
        ]);

        //Get User ID From Session
        $user_id = $request->session()->get('user_id');

        foreach ($request->member as $member) {
            //Insert Data
            $data = [
                'member_user_id' => $member,
                'member_project_id' => $project_id,
                'member_role' => 'member',
                'member_status' => 'active'
            ];
            Member::create($data);

            //Add To Log History (Owner Added Member)
            $history = [
                'history_user_id' => $user_id,
                'history_project_id' => $project_id,
                'history_subject' => User::find($user_id)->user_name,
                'history_verb' => __('history.add_member'),
                'history_object' => User::find($member)->user_name
            ];
            History::create($history);
        }

        //Flash Message
        Session::flash('icon', 'success');
        Session::flash('alert', 'Add Success');
        Session::flash('subalert', 'Project member added');

        //Back To Project member
        return redirect()->route('project_member', $project_id);
    }

    public function remove($project_id, Request $request)
    {
        $member_id = htmlspecialchars($request->id);
        $user_id = $request->session()->get('user_id');
        $member_user_id = Member::find($member_id)->member_user_id;

        //Owner Id
        $owner = Member::where('member_role', 'owner')
            ->where('member_project_id', $project_id)
            ->first()
            ->member_id;

        //Check Is Remove Owner
        if ($member_id == $owner) {
            Session::flash('icon', 'error');
            Session::flash('alert', 'Remove Failed');
            Session::flash('subalert', 'Cannot remove owner');

            return redirect()->route('project_member', $project_id);
        }

        //Remove Member
        Member::destroy($member_id);

        //Add To Log History (Owner Remove Member)
        $history = [
            'history_user_id' => $user_id,
            'history_project_id' => $project_id,
            'history_subject' => User::find($user_id)->user_name,
            'history_verb' => __('history.remove_member'),
            'history_object' => User::find($member_user_id)->user_name
        ];
        History::create($history);

        //Flash Message
        Session::flash('icon', 'success');
        Session::flash('alert', 'Remove Success');
        Session::flash('subalert', 'Project member removed');

        //Back To Project Member
        return redirect()->route('project_member', $project_id);
    }
}
