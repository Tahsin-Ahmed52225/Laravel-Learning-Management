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

Route::match(['get', 'post'], '/adminlogin', 'UserController@adminLogin')->name('adminlogin')->middleware('guest');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('/allstudent', 'AdminController@allstudent')->name('allstudent');
    Route::get('/allcourse', 'AdminController@allcourse')->name('allcourse');
});




Route::match(['get', 'post'], '/login', 'UserController@login')->name('login')->middleware('guest');
Route::POST('/login_teacher', 'UserController@login_teacher')->name('login_teacher');
Route::POST('/login_student', 'UserController@login_student')->name('login_student');
Route::get('/logout', 'UserController@logout')->name('logout');
Route::get('/verify', 'UserController@verify_User')->name('verify_User');

// Teacher Routes
Route::prefix('teacher')->name('teacher.')->middleware(['auth', 'teacher'])->group(function () {

    Route::match(['get', 'post'], '/dashboard', 'teacherController@dashboard')->name('dashboard');
    Route::POST('/addclass', 'classController@addclass')->name('addclass');
    Route::get('/allclass', 'classController@allclass')->name('allclass');
    Route::match(['get', 'post'], '/class/{id}', 'classController@singleclass')->name('class');
    Route::get('/studentlist/{id}', 'teacherController@studentlist')->name('studentlist');


    Route::get('/profile', 'teacherController@profile')->name('profile');
    Route::match(['get', 'post'], '/editprofile', 'teacherController@editprofile')->name('editprofile');
    Route::post('/addpost/{id}', 'teacherController@addpost')->name('addpost');

    Route::post('/addcomment/{id}', 'teacherController@addcomment')->name('addcomment');
});
Route::prefix('student')->name('student.')->middleware(['auth', 'student'])->group(function () {

    Route::match(['get', 'post'], '/dashboard', 'studentController@dashboard')->name('dashboard');
    Route::get('/allclass', 'classController@Stuallclass')->name('Stuallclass');
    Route::POST('/joinclass', 'classController@joinclass')->name('joinclass');
    Route::match(['get', 'post'], '/class/{id}', 'classController@Stusingleclass')->name('Stuclass');
    Route::post('/addcomment/{id}', 'studentController@addcomment')->name('addcomment');

    Route::get('/profile', 'studentController@profile')->name('profile');
    Route::match(['get', 'post'], '/editprofile', 'studentController@editprofile')->name('editprofile');
    Route::post('/addpost/{id}', 'studentController@addpost')->name('addpost');
});
