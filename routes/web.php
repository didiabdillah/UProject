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

//Blocked
Route::get('/blocked', 'AuthController@blocked')->name('blocked');

Route::group(['middleware' => ['is_Not_Login']], function () {
    Route::get('/', 'AuthController@login');

    //Login
    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/login', 'AuthController@login_process')->name('login_process');

    //Register
    Route::get('/register', 'AuthController@register')->name('register');
    Route::post('/register', 'AuthController@register_process')->name('register_process');
    Route::post('/register/checkemail', 'AuthController@register_check_email')->name('register_check_email');
});

//USER PAGE (LOGIN REQUIRED)
Route::group(['middleware' => ['is_Login']], function () {
    //Home
    Route::get('/home', 'HomeController@index')->name('home');

    //Project
    Route::get('/project', 'ProjectController@index')->name('project');

    //Project Detail
    Route::group(['prefix' => '{project_id}'], function () {
        Route::get('project', 'ProjectController@detail')->name('project_detail');
    });

    //Profile Setting
    Route::group(['prefix' => 'u'], function () {
        Route::get('{user_id}', 'ProfileController@index')->name('profile');
        Route::get('{user_id}/setting', 'ProfileController@setting')->name('setting');
    });
});
