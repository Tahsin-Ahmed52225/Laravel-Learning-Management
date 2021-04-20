<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\User;

use Auth;

use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
    public function login(Request $req)
    {
        $token = Str::random(20);
        if ($req->ajax()) {
            $user = User::create([
                'Fname' => $req->first_name,
                'Lname' => $req->last_name,
                'Uname' => $req->user_name,
                'email' => $req->email,
                'institution' => $req->institution,
                'type' => $req->type,
                'password' => Hash::make($req->password),
                'verification_code' => $token,

            ]);

            if ($user != null) {
                MailController::sendSignupemail($req->first_name, $req->email, $token);
            }

            $msg = "<div class='alert alert-success fade show' role='alert'>
                                          Successfully registred!
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
            return response()->json(array('msg' => $msg), 200);
        }
        if ($req->isMethod("GET")) {
            return view("auth.login2");
        }
    }
    public function verify_User(Request $req)
    {
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $user = User::where("verification_code", "=", $verification_code)->first();

        if ($user != null) {
            $user->is_verified = 1;
            $user->save();

            return redirect()->back()->with(session()->flash('alert-success', 'Your account is verfied, Please login'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Invaild verification code'));
    }
    public function login_teacher(Request $req)
    {
        $email = $req->teacher_email;
        $password = $req->teacher_password;

        if ($req->isMethod('post')) {

            if (Auth::attempt(['email' =>  $email, 'password' => $password])) {
                if (Auth::user()->is_verified == 0) {
                    Auth::logout();
                    return redirect()->back()->with(session()->flash('alert-warning', 'Please verify you email first'));
                } else {
                    return "echo 'I am logged in'";
                }
            } else {
                return redirect()->back()->with(session()->flash('alert-danger', 'Incorrect Credentials'));
            }
        }
        return view('index');
    }
}
