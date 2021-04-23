<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Course;

use App\joinclass;

use Illuminate\Support\Facades\Auth;

class classController extends Controller
{
    public function addclass(Request $request)
    {
        if ($request->isMethod("POST")) {
            $course_code = Str::random(5);
            $course = Course::create([
                'Course_name' => $request->course_name,
                'Course_code' => $request->course_code,
                'Course_teacher' => Auth::user()->id,
                'Course_key' =>  $course_code,
            ]);
            if ($course != null) {
                MailController::createClassMail(Auth::user()->Fname, Auth::user()->email, $request->course_name, $request->course_code, $course_code);
                return redirect()->back()->with(session()->flash('alert-success', 'New Class has been Created Code: ' . $course_code));
            }
        }
        return redirect()->route("teacher.dashboard");
    }
    public function joinclass(Request $request)
    {
        if ($request->isMethod("POST")) {
            $join = Course::where("Course_key", "=", $request->course_code)->first();
            if ($join != null) {
                $course = joinclass::create([
                    'CourseID' => $join->id,
                    'Course_Name' => $join->Course_name,
                    'Student_ID' => Auth::user()->id,
                ]);
                return redirect()->back()->with(session()->flash('alert-success', 'You have joined ' . $join->Course_name . " class"));
            } else {
                return redirect()->back()->with(session()->flash('alert-danger', ' Wrong Class Code !'));
            }

            // if ($course != null) {
            //     MailController::createClassMail(Auth::user()->Fname, Auth::user()->email, $request->course_name, $request->course_code, $course_code);
            //     return redirect()->back()->with(session()->flash('alert-success', 'New Class has been Created Code: ' . $course_code));
            // }
        }
        return redirect()->route("teacher.dashboard");
    }
}
