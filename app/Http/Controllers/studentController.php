<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use App\joinclass;

use App\post;

use App\User;

use App\comment;

use Illuminate\Support\Facades\Hash;

class studentController extends Controller
{
    public function dashboard(Request $request)
    {
        if ($request->isMethod("GET")) {
            $course = joinclass::where("Student_ID", "=", Auth::user()->id)->get();

            $post = DB::table('post')
                ->join("joinclass", "joinclass.CourseID", "=", "post.CourseID")
                ->join("users", "post.writter_ID", "=", "users.id")
                ->join("class", "class.id", "=", "joinclass.CourseID")
                ->where("joinclass.Student_ID", "=", Auth::user()->id)
                ->orderBy('post.created_at', 'DESC')->get(["post.*", "class.Course_name", "users.Fname", "users.Lname"]);

            $comment = DB::table('commment')
                ->join("post", "post.id", "=", "commment.Post_ID")
                ->join("users", "users.id", "=", "commment.writter_ID")
                ->get(["commment.*", "users.Fname", "users.Lname"]);

            return  view("student.dashboard", ['courses' => $course, 'post' => $post, 'comments' => $comment]);
        } elseif ($request->isMethod("POST")) {
            $post = post::create([
                'content' => $request->content,
                'CourseID' => $request->course_id,
                'writter_ID' => Auth::user()->id,
            ]);
            return redirect()->back()->with(session()->flash('alert-success', ' Post has been published'));
        }
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
    public function profile(Request $request)
    {
        if ($request->isMethod("GET")) {
            $classes = joinclass::where("Student_ID", "=", Auth::user()->id)->get();
            //  dd($classes);
            return  view("student.profile", ['courses' => $classes]);
        }
    }
    public function editprofile(Request $request)
    {
        if ($request->isMethod("GET")) {
            $classes = joinclass::where("Student_ID", "=", Auth::user()->id)->get();
            //  dd($classes);
            return  view("student.editprofile", ['courses' => $classes]);
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
}
