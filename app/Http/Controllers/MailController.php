<?php

namespace App\Http\Controllers;

use App\Mail\createCoursemail;
use App\Mail\signupmail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public static function sendSignupemail($name, $email, $verification_code)
    {
        $data = [
            'name' => $name,
            'verfication_code' => $verification_code,
        ];
        Mail::to($email)->send(new signupmail($data));
    }
    public static function createClassMail($name, $email, $course_name, $course_code, $course_key)
    {
        $data = [
            'name' => $name,
            'course_name' => $course_name,
            'course_code' => $course_code,
            'course_key' => $course_key,
        ];
        Mail::to($email)->send(new createCoursemail($data));
    }
}
