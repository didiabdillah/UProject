<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

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

    public function settings_password(Request $request, $user_id)
    {
        $user_id = ($user_id == 'me') ? Session::get('user_id') : $user_id;

        // Input Validation
        $request->validate([
            'old_password'  => 'required|max:100',
            'new_password'  => 'required|max:100',
            'retype_password'  => 'required|max:100|same:new_password'
        ]);

        //Check Is Valid User
        if ($request->session()->get('user_id') != $user_id) {
            return redirect()->route('forbidden');
        }

        $old_password = htmlspecialchars($request->old_password);
        $new_password = htmlspecialchars($request->new_password);

        //Check Old Password
        if (Hash::check($old_password, User::find($user_id)->user_password)) {
            //Update Data
            User::where('user_id', $user_id)
                ->update([
                    'user_password' => Hash::make($new_password)
                ]);

            //Flash Message
            flash_alert(
                __('alert.icon_success'),
                'Success',
                'Password updated'
            );

            return redirect()->back();
        } else {
            //Flash Message
            flash_alert(
                __('alert.icon_error'),
                'Failed',
                'Please check your old password'
            );

            return redirect()->back();
        }

        return redirect()->back();
    }
}
