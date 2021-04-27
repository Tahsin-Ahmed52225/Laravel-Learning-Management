<?php

namespace App\Http\Controllers;

use App\Course;


use App\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $teacher = User::where("type", "=", "teacher")->get();
        //   dd($teacher);
        return view("admin.dashboard", ["teachers" => $teacher]);
    }
    public function allstudent()
    {
        $student = User::where("type", "=", "student")->get();
        //   dd($teacher);
        return view("admin.dashboard", ["teachers" => $student]);
    }
    public function allcourse()
    {
        $course = Course::join("users", "users.id", "=", "class.Course_teacher")
            ->get(["users.*", "class.*"]);
        //   dd($teacher);
        return view("admin.allcourse", ["course" => $course]);
    }
}
