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

Route::get('/', function () {
    return view('index');
});
Route::match(['get', 'post'], '/login-lms', 'UserController@login')->name('login-lms');
Route::POST('/login_teacher', 'UserController@login_teacher')->name('login_teacher');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify', 'UserController@verify_User')->name('verify_User');
