<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = "class";

    protected $fillable = [
        'Course_name',
        'Course_code',
        'Course_teacher',
        'Course_key',
    ];
}
