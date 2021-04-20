<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Fname', 'Lname', 'Uname', 'email', 'institution', 'type', 'password', 'verification_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function isAdmin()
    {
        if ($this->type == 'admin') {
            return true;
        } else {
            return false;
        }
    }
    public function isTeacher()
    {
        if ($this->type == 'coach') {
            return true;
        } else {
            return false;
        }
    }
    public function isStudent()
    {
        if ($this->type == 'league') {
            return true;
        } else {
            return false;
        }
    }
}
