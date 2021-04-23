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
})->name("index")->middleware('guest');
Route::match(['get', 'post'], '/login', 'UserController@login')->name('login')->middleware('guest');
Route::POST('/login_teacher', 'UserController@login_teacher')->name('login_teacher');
Route::POST('/login_student', 'UserController@login_student')->name('login_student');
Route::get('/logout', 'UserController@logout')->name('logout');
Route::get('/verify', 'UserController@verify_User')->name('verify_User');

// Teacher Routes
Route::prefix('teacher')->name('teacher.')->middleware(['auth', 'teacher'])->group(function () {

    Route::match(['get', 'post'], '/dashboard', 'teacherController@dashboard')->name('dashboard');
    Route::POST('/addclass', 'classController@addclass')->name('addclass');
    // Route::match(['get', 'post'], '/add-member', 'sadmintdgController@addMember')->name('addMember');
    // Route::get('/viewMember', 'sadmintdgController@viewMember')->name('viewMember');
    // Route::match(['get', 'post'], '/timesheet', 'sadmintdgController@timesheet')->name('timesheet');
});
Route::prefix('student')->name('student.')->middleware(['auth', 'student'])->group(function () {

    Route::match(['get', 'post'], '/dashboard', 'studentController@dashboard')->name('dashboard');
    Route::POST('/joinclass', 'classController@joinclass')->name('joinclass');
    // Route::match(['get', 'post'], '/add-member', 'sadmintdgController@addMember')->name('addMember');
    // Route::get('/viewMember', 'sadmintdgController@viewMember')->name('viewMember');
    // Route::match(['get', 'post'], '/timesheet', 'sadmintdgController@timesheet')->name('timesheet');
});
