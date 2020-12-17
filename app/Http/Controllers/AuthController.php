<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

use App\Rules\Captcha;

use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_process(Request $request)
    {
        //Validation Form
        $request->validate(
            [
                'login_email'  => 'required|email:rfc,dns',
                'login_password'  => 'required',
                'g-recaptcha-response' => new Captcha(),
            ],
            [
                'login_password.required' => 'The password field is required.',
                'login_email.required' => 'The email field is required.',
                'login_email.email' => 'The email field is wrong format.'
            ]
        );

        $email = htmlspecialchars($request->login_email);
        $password = htmlspecialchars($request->login_password);
        $remember = htmlspecialchars($request->remember);

        $user = User::firstWhere('user_email', $email);

        //Check Email Account Available
        if ($user) {
            //Check Email Match
            if ($email == $user->user_email) {
                //Check Password Match
                if (Hash::check($password, $user->user_password)) {
                    //Check Remember Me
                    if ($remember != NULL) {
                        //Create Cookie
                        Cookie::queue(Cookie::make('account', $user->user_email, 10));
                        Cookie::queue(Cookie::make('access', $user->user_role, 10));
                    }

                    //Create Session
                    $data = [
                        'user_id' => $user->user_id,
                        'user_role' => $user->user_role,
                        'user_name' => $user->user_name,
                        'user_email' => $user->user_email,
                        'user_image' => $user->user_image
                    ];
                    $request->session()->put($data);

                    //Goto User Home
                    return redirect()->route('home');
                } else {
                    Session::flash('icon', 'error');
                    Session::flash('alert', 'Login Failed');
                    Session::flash('subalert', 'Wrong Password');

                    return redirect()->back();
                }
            } else {
                Session::flash('icon', 'error');
                Session::flash('alert', 'Login Failed');
                Session::flash('subalert', 'Wrong Email');

                return redirect()->back();
            }
        } else {
            Session::flash('icon', 'error');
            Session::flash('alert', 'Login Failed');
            Session::flash('subalert', 'Account Not Found');

            return redirect()->back();
        }

        //If Bug Not Through Filtering Process Above
        Session::flash('icon', 'error');
        Session::flash('alert', 'Login Failed');
        Session::flash('subalert', 'Something Wrong');

        return redirect()->back();
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_process(Request $request)
    {
        //Validation Form
        $request->validate(
            [
                'register_name'  => 'required',
                'register_email'  => 'required|email:rfc,dns',
                'register_password'  => 'required',
                'retype_password'  => 'required|same:register_password',
                'terms'  => 'required',
                'g-recaptcha-response' => new Captcha(),
            ],
            [
                'register_password.required' => 'The password field is required.',
                'retype_password.required' => 'The retype password field is required.',
                'retype_password.same' => 'The retype password field is not same.',
                'register_name.required' => 'The name field is required.',
                'register_email.required' => 'The email field is required.',
                'register_email.email' => 'The email field is wrong format.'
            ]
        );

        //Check Is Email Already Registered
        $count = User::where('user_email', $request->register_email)->count();
        if ($count > 0) {
            Session::flash('icon', 'error');
            Session::flash('alert', 'Register Failed');
            Session::flash('subalert', 'Email Not Available');
            return redirect()->back();
        }

        //Insert Data 
        $data = [
            'user_name' => htmlspecialchars($request->register_name),
            'user_email' => htmlspecialchars($request->register_email),
            'user_password' => Hash::make(htmlspecialchars($request->register_password)),
            'user_role' => 'user',
            'user_email_verified_at' => NULL,
            'user_image' => 'default.jpg'
        ];
        User::create($data);

        //Flash Message
        Session::flash('icon', 'success');
        Session::flash('alert', 'Register Success');
        Session::flash('subalert', 'Please Check Email For Confirmation');

        //Back To Login
        return redirect()->route('login');
    }

    public function register_check_email(Request $request)
    {
        if ($request->register_email) {
            $count = User::where('user_email', htmlspecialchars($request->register_email))->count();

            if ($count > 0) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function logout()
    {
        //Clean Session
        Session::flush();

        //Clean Cookie
        Cookie::queue(Cookie::forget('account'));
        Cookie::queue(Cookie::forget('access'));

        //Flash Message
        Session::flash('icon', 'success');
        Session::flash('alert', 'Logout Success');
        Session::flash('subalert', 'Login Again For Use Application');

        //Back To Login
        return redirect()->route('login');
    }

    public function locked()
    {
        return view('auth.lock');
    }

    public function forgot_password()
    {
        return view('auth.forgot_password');
    }

    public function change_password()
    {
        return view('auth.change_password');
    }
}
