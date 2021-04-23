<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\joinclass;

class studentController extends Controller
{
    public function dashboard(Request $request)
    {
        if ($request->isMethod("GET")) {
            $course = joinclass::where("Student_ID", "=", Auth::user()->id)->get();
            return  view("student.dashboard", ['courses' => $course]);
        }
    }
}
