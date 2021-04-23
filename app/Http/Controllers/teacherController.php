<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Course;

class teacherController extends Controller
{
    public function dashboard(Request $request)
    {
        if ($request->isMethod("GET")) {
            $classes = Course::where("Course_Teacher", "=", Auth::user()->id)->get();
            //  dd($classes);
            return  view("teacher.dashboard", ['courses' => $classes]);
        }
    }
}
