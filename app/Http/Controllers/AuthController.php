<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Facades\Socialite;

use App\Rules\Captcha;

use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function login_process(Request $request)
    {
        //Validation Form
        $request->validate(
            [
                'login_email'  => 'required|email:rfc,dns|max:255',
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
                        Cookie::queue(Cookie::make('account', $user->user_email, 60 * 24));
                        Cookie::queue(Cookie::make('access', $user->user_role, 60 * 24));
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
                    //Flash Message
                    flash_alert(
                        __('alert.icon_error'), //Icon
                        'Login Failed', //Alert Message 
                        'Wrong Password' //Sub Alert Message
                    );

                    return redirect()->back();
                }
            } else {
                //Flash Message
                flash_alert(
                    __('alert.icon_error'), //Icon
                    'Login Failed', //Alert Message 
                    'Wrong Email' //Sub Alert Message
                );

                return redirect()->back();
            }
        } else {
            //Flash Message
            flash_alert(
                __('alert.icon_error'), //Icon
                'Login Failed', //Alert Message 
                'Account Not Found' //Sub Alert Message
            );

            return redirect()->back();
        }

        //If Bug Not Through Filtering Process Above
        //Flash Message
        flash_alert(
            __('alert.icon_error'), //Icon
            'Login Failed', //Alert Message 
            'Something Wrong' //Sub Alert Message
        );

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
                'register_name'  => 'required|max:255',
                'register_email'  => 'required|email:rfc,dns|max:255',
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
                'register_email.email' => 'The email field is wrong format.',
                'terms.required' => 'Please agree the terms.'
            ]
        );

        //Check Is Email Already Registered
        $count = User::where('user_email', $request->register_email)->count();
        if ($count > 0) {
            //Flash Message
            flash_alert(
                __('alert.icon_error'), //Icon
                'Register Failed', //Alert Message 
                'Email Not Available' //Sub Alert Message
            );

            return redirect()->back();
        }

        //Insert Data 
        $data = [
            'user_id' => hexdec(uniqid()) . strtotime(now()),
            'user_name' => htmlspecialchars($request->register_name),
            'user_email' => htmlspecialchars($request->register_email),
            'user_password' => Hash::make(htmlspecialchars($request->register_password)),
            'user_role' => 'user',
            'user_email_verified_at' => NULL,
            'user_image' => 'default.jpg'
        ];
        User::create($data);

        //Flash Message
        flash_alert(
            __('alert.icon_success'), //Icon
            'Register Success', //Alert Message 
            'Please Check Email For Confirmation' //Sub Alert Message
        );

        //Back To Login
        return redirect()->route('login');
    }

    public function register_check_email(Request $request)
    {
        if (htmlspecialchars($request->register_email)) {
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
        flash_alert(
            __('alert.icon_success'), //Icon
            'Logout Success', //Alert Message 
            'Login Again For Use Application' //Sub Alert Message
        );

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

    //Google Login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    //Google Callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        dd($user);

        //Return Home After Login
        return redirect()->route('home');
    }
}
