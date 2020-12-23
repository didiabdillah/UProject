<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

use App\Models\User;

class ProfileController extends Controller
{
    public function index($user_id)
    {
        $user_id = ($user_id == 'me') ? Session::get('user_id') : $user_id;

        //Get User Data
        $user = User::firstWhere('user_id', $user_id);

        //Check Is Exist User
        if (!$user) {
            return redirect()->route('not_found');
        }

        return view('profile.profile', ['user' => $user, 'user_id' => $user_id]);
    }

    public function settings($user_id)
    {
        $user_id = ($user_id == 'me') ? Session::get('user_id') : $user_id;

        //Check Is Valid User
        if (Session::get('user_id') != $user_id) {
            return redirect()->route('forbidden');
        }

        //Get User Data
        $user = User::firstWhere('user_id', $user_id);

        return view('profile.settings', ['user' => $user, 'user_id' => $user_id]);
    }

    public function settings_user(Request $request, $user_id)
    {
        $user_id = ($user_id == 'me') ? Session::get('user_id') : $user_id;

        // Input Validation
        $request->validate([
            'user_name'  => 'required|max:255',
            'user_email'  => 'required|email:rfc,dns|max:255'
        ]);

        //Check Is Valid User
        if ($request->session()->get('user_id') != $user_id) {
            return redirect()->route('forbidden');
        }

        //Update Data
        User::where('user_id', $user_id)
            ->update([
                'user_name' => htmlspecialchars($request->user_name),
                'user_email' => htmlspecialchars($request->user_email)
            ]);

        //Update Session
        $data = [
            'user_name' => htmlspecialchars($request->user_name),
            'user_email' => htmlspecialchars($request->user_email),
        ];
        $request->session()->put($data);

        //Update Cookie If Exist
        if (Cookie::get('account')) {
            Cookie::queue(Cookie::forget('account'));
            Cookie::queue(Cookie::make('account', htmlspecialchars($request->user_email), 10));
        }

        //Flash Message
        flash_alert(
            __('alert.icon_success'),
            'Success',
            'Account updated'
        );

        return redirect()->back();
    }
}
