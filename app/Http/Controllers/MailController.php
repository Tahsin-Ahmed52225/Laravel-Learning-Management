<?php

namespace App\Http\Controllers;

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
}
