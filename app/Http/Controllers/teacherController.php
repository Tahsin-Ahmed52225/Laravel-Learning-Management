<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use App\Course;

use App\post;

use App\comment;
use App\joinclass;
use App\User;
use Illuminate\Support\Facades\Hash;

class teacherController extends Controller
{
    public function dashboard(Request $request)
    {
        $classes = Course::where("Course_Teacher", "=", Auth::user()->id)->get();
        $post = DB::table('post')
            ->join("class", "class.id", "=", "post.CourseID")
            ->join("users", "post.writter_ID", "=", "users.id")
            ->where("class.Course_Teacher", "=", Auth::user()->id)
            ->orderBy('post.created_at', 'DESC')->get(["post.*", "class.Course_name", "users.Fname", "users.Lname"]);

        $comment = DB::table('commment')
            ->join("post", "post.id", "=", "commment.Post_ID")
            ->join("users", "users.id", "=", "commment.writter_ID")
            ->get(["commment.*", "users.Fname", "users.Lname"]);
        //   dd($comment);
        //dd($post);
        //dd($post);
        if ($request->isMethod("GET")) {
            return  view("teacher.dashboard", ['courses' => $classes, 'post' => $post, 'comments' => $comment]);
        } elseif ($request->isMethod("POST")) {
            $post = post::create([
                'content' => $request->content,
                'CourseID' => $request->course_id,
                'writter_ID' => Auth::user()->id,
            ]);
            return redirect()->back()->with(session()->flash('alert-success', ' Post has been published'));
        }
    }

    public function profile(Request $request)
    {
        if ($request->isMethod("GET")) {
            $classes = Course::where("Course_Teacher", "=", Auth::user()->id)->get();
            //  dd($classes);
            return  view("teacher.profile", ['courses' => $classes]);
        }
    }
    public function editprofile(Request $request)
    {
        if ($request->isMethod("GET")) {
            $classes = Course::where("Course_Teacher", "=", Auth::user()->id)->get();
            //  dd($classes);
            return  view("teacher.editprofile", ['courses' => $classes]);
        } else {
            $id = Auth::user()->id;
            // $Fname = $request->Fname;
            // $Lname = $request->Lname;
            // $institution = $request->institution;
            // $password = $request->password;
            if ($request != null) {
                if ($request->Fname != '') {
                    $user = User::where("id", "=", $id)->update(["Fname" => $request->Fname]);

                    //return redirect()->back()->with(session()->flash('alert-success', 'Profile Name Updated'));
                }
                if ($request->Lname != '') {
                    $user = User::where("id", "=", $id)->update(["Lname" => $request->Lname]);
                    //  return redirect()->back()->with(session()->flash('alert-success', 'Profile Name Updated'));
                }
                if ($request->institution != '') {
                    $user = User::where("id", "=", $id)->update(["institution" => $request->institution]);
                    //  return redirect()->back()->with(session()->flash('alert-success', 'Profile Name Updated'));
                }
                if ($request->password != '') {
                    $user = User::where("id", "=", $id)->update(["password" => Hash::make($request->password)]);
                    //  return redirect()->back()->with(session()->flash('alert-success', 'Profile Name Updated'));
                }
                return redirect()->back()->with(session()->flash('alert-success', 'Profile Updated'));
            }
        }
    }
    public function addpost(Request $request, $id)
    {
        if ($request->isMethod("POST")) {
            $post = post::create([
                'content' => $request->content,
                'CourseID' => $id,
                'writter_ID' => Auth::user()->id,
            ]);
            return redirect()->back();
        }
        return route("teacher.dashboard");
    }
    public function addcomment(Request $request, $id)
    {
        if ($request->isMethod("POST")) {
            $comment = comment::create([
                'content' => $request->comment_content,
                'Post_ID' => $id,
                'writter_ID' => Auth::user()->id,
            ]);
            return redirect()->back();
        }
        return route("teacher.dashboard");
    }
    public function studentlist($id)
    {
        $classes = Course::where("Course_Teacher", "=", Auth::user()->id)->get();
        $item =  Course::where("id", "=", $id)->first();
        $student = joinclass::where("CourseID", "=", $id)
            ->join("users", "users.id", "=", "Student_ID")
            ->get(["users.*"]);

        return view("teacher.studentlist", ["item" => $item, "students" => $student, "courses" => $classes]);
    }
}
