<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Course;

use App\joinclass;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

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
                return redirect()->route("teacher.class", $course->id)->with(session()->flash('alert-success', 'New Class has been Created Code: ' . $course_code));
            }
        }
        return redirect()->route("teacher.dashboard");
    }
    public function joinclass(Request $request)
    {
        if ($request->isMethod("POST")) {
            $join = Course::where("Course_key", "=", $request->course_code)->first();
            $valided = Course::where("Course_key", "=", $request->course_code)
                ->join("joinclass", "joinclass.CourseID", "=", "class.id")
                ->where("Student_ID", "=", Auth::user()->id)->first();
            if ($valided) {
                return redirect()->back()->with(session()->flash('alert-warning', ' Already joined this class !'));
            } else {
                if ($join != null) {
                    $course = joinclass::create([
                        'CourseID' => $join->id,
                        'Course_Name' => $join->Course_name,
                        'Student_ID' => Auth::user()->id,
                    ]);
                    return redirect()->route("student.Stuclass", $join->id)->with(session()->flash('alert-success', 'You have joined ' . $join->Course_name . " class"));
                } else {
                    return redirect()->back()->with(session()->flash('alert-danger', ' Wrong Class Code !'));
                }
            }

            // if ($course != null) {
            //     MailController::createClassMail(Auth::user()->Fname, Auth::user()->email, $request->course_name, $request->course_code, $course_code);
            //     return redirect()->back()->with(session()->flash('alert-success', 'New Class has been Created Code: ' . $course_code));
            // }
        }
        return redirect()->route("teacher.dashboard");
    }
    public function allclass(Request $request)
    {
        if ($request->isMethod("GET")) {
            // $classes = DB::table('class')
            //     ->where("class.Course_Teacher", "=", Auth::user()->id)
            //     // ->join("joinclass", "joinclass.CourseID", "=", "class.id")
            //     ->get();
            $classes = Course::where("Course_Teacher", "=", Auth::user()->id)->get();
            $students = [];
            foreach ($classes as $class) {
                $students[$class->id] = joinclass::where("CourseID", "=", $class->id)->count();
            }

            // dd($classes);
            //  dd($classes);
            return  view("teacher.allClass", ['courses' => $classes, 'students' => $students]);
        }
    }
    public function Stuallclass(Request $request)
    {
        if ($request->isMethod("GET")) {
            // $classes = DB::table('class')
            //     ->where("class.Course_Teacher", "=", Auth::user()->id)
            //     // ->join("joinclass", "joinclass.CourseID", "=", "class.id")
            //     ->get();
            $classes = joinclass::where("Student_ID", "=", Auth::user()->id)
                ->join("class", "class.id", "=", "joinclass.CourseID")
                ->join("users", "users.id", "=", "class.Course_teacher")
                ->get(["joinclass.*", "class.Course_code", "class.Course_teacher", "class.Course_key", "users.Fname", "users.Lname", "users.email"]);
            //  dd($classes);
            $students = [];
            foreach ($classes as $class) {
                $students[$class->id] = joinclass::where("CourseID", "=", $class->id)->count();
            }

            // dd($classes);
            //  dd($classes);
            return  view("student.allClass", ['courses' => $classes, 'students' => $students]);
        }
    }

    public function singleclass($id)
    {
        $item =  Course::where("id", "=", $id)->first();
        $classes = Course::where("Course_Teacher", "=", Auth::user()->id)->get();

        $post = DB::table('post')
            ->where("post.CourseID", "=", $id)
            ->join("class", "class.id", "=", "post.CourseID")
            ->join("users", "post.writter_ID", "=", "users.id")
            ->where("class.Course_Teacher", "=", Auth::user()->id)
            ->orderBy('post.created_at', 'DESC')->get(["post.*", "class.Course_name", "users.Fname", "users.Lname"]);
        $comment = DB::table('commment')
            ->join("post", "post.id", "=", "commment.Post_ID")
            ->join("users", "users.id", "=", "commment.writter_ID")
            ->get(["commment.*", "users.Fname", "users.Lname"]);
        $students = [];
        foreach ($classes as $class) {
            $students[$class->id] = joinclass::where("CourseID", "=", $class->id)->count();
        }

        //  dd($post);

        return view("teacher.singleClass", ["courses" => $classes, "item" => $item, "post" => $post, "comments" => $comment, 'students' => $students]);
    }
    public function Stusingleclass($id)
    {
        $item = joinclass::where("joinclass.CourseID", "=", $id)
            ->join("class", "class.id", "=", "joinclass.CourseID")
            ->join("users", "users.id", "=", "class.Course_teacher")
            ->get(["joinclass.*", "class.Course_code", "class.Course_teacher", "class.Course_key", "users.Fname", "users.Lname", "users.email"])->first();

        //  $item =  joinclass::where("id", "=", $id)->first();
        $classes = joinclass::where("Student_ID", "=", Auth::user()->id)->get();

        $post = DB::table('post')
            ->where("post.CourseID", "=", $id)
            ->join("joinclass", "joinclass.CourseID", "=", "post.CourseID")
            ->join("class", "class.id", "=", "joinclass.CourseID")
            ->join("users", "post.writter_ID", "=", "users.id")
            ->where("joinclass.Student_ID", "=", Auth::user()->id)
            ->orderBy('post.created_at', 'DESC')->get(["post.*", "class.Course_name", "users.Fname", "users.Lname"]);
        $comment = DB::table('commment')
            ->join("post", "post.id", "=", "commment.Post_ID")
            ->join("users", "users.id", "=", "commment.writter_ID")
            ->get(["commment.*", "users.Fname", "users.Lname"]);

        return view("student.singleClass", ["courses" => $classes, "item" => $item, "post" => $post, "comments" => $comment]);
    }
}
