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
        Route::get('project/history', 'ProjectController@history')->name('project_history');

        //Project Member Detail
        Route::get('project/member', 'ProjectController@member')->name('project_member');

        //Project Discussion Detail 
        Route::get('project/discussion', 'ProjectController@discussion')->name('project_discussion');

        //Project Task Detail
        Route::get('project/task', 'ProjectController@task')->name('project_task');
    });

    //Profile Setting
    Route::group(['prefix' => 'u'], function () {
        Route::get('{user_id}', 'ProfileController@index')->name('profile');

        //Profile Setting
        Route::get('{user_id}/setting', 'ProfileController@setting')->name('setting');
    });
});
