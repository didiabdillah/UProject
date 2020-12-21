<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Logout
Route::get('/logout', 'AuthController@logout')->name('logout');

//AUTH PAGE (NOT LOGIN REQUIRED)
Route::group(['middleware' => ['is_Not_Login']], function () {
    //Root Link -> Linked To Login
    Route::get('/', 'AuthController@login');

    //Login
    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/login', 'AuthController@login_process')->name('login_process');

    //Register
    Route::get('/register', 'AuthController@register')->name('register');
    Route::post('/register', 'AuthController@register_process')->name('register_process');
    Route::post('/register/checkemail', 'AuthController@register_check_email')->name('register_check_email');

    //Forgot Password
    Route::get('/forgot', 'AuthController@forgot_password')->name('forgot_password');

    //Change To New Password (Forgot Password)
    Route::get('/change', 'AuthController@change_password')->name('change_password');

    //Login Via Google
    Route::get('login/google', 'AuthController@redirectToGoogle')->name('login_google');
    Route::get('login/google/callback', 'AuthController@handleGoogleCallback')->name('callback_google');

    //Login Via Github
    Route::get('login/github', 'AuthController@redirectToGithub')->name('login_github');
    Route::get('login/github/callback', 'AuthController@handleGithubCallback')->name('callback_github');
});

//USER PAGE (LOGIN REQUIRED)
Route::group(['middleware' => ['is_Login']], function () {
    //Locked Account
    Route::get('/locked', 'AuthController@locked')->name('locked');

    //403 Forbidden Page
    Route::get('/forbidden', 'ErrorController@forbidden')->name('forbidden');

    //404 Not Found Page
    Route::get('/notfound', 'ErrorController@not_found')->name('not_found');

    //Home
    Route::get('/home', 'HomeController@index')->name('home');

    //Project
    Route::get('/project', 'ProjectController@index')->name('project');

    //Project Add
    Route::group(['prefix' => 'add'], function () {
        Route::get('project', 'ProjectController@insert')->name('project_add');
        Route::post('project', 'ProjectController@store')->name('project_add_post');
    });

    // PROJECT
    Route::group(['prefix' => '{project_id}'], function () {
        //Project Detail
        Route::get('project', 'ProjectController@detail')->name('project_detail');

        //Project History Detail
        Route::get('project/history', 'ProjectHistoryController@index')->name('project_history');

        //Project Member Detail
        Route::get('project/member', 'ProjectMemberController@index')->name('project_member');
        Route::get('project/member/add', 'ProjectMemberController@add')->name('project_member_add');
        Route::post('project/member/add', 'ProjectMemberController@store')->name('project_member_add_post');
        Route::delete('project/member', 'ProjectMemberController@remove')->name('project_member_remove');

        //Project Discussion Detail 
        Route::get('project/discussion', 'ProjectDiscussionController@index')->name('project_discussion');

        //Project Task Detail
        Route::get('project/task', 'ProjectTaskController@index')->name('project_task');
    });

    //Profile Setting
    Route::group(['prefix' => 'u'], function () {
        Route::get('{user_id}', 'ProfileController@index')->name('profile');

        //Profile Setting
        Route::get('{user_id}/settings', 'ProfileController@settings')->name('profile_settings');
        Route::put('{user_id}/settings', 'ProfileController@settings_user')->name('profile_settings_user');
        Route::patch('{user_id}/settings', 'ProfileController@settings_password')->name('profile_settings_password');
    });
});
// TESTING
Route::get('test', 'Controller@faker');
