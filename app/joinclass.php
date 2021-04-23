<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class joinclass extends Model
{
    protected $table = "joinclass";
    protected $fillable = [
        'CourseID',
        'Course_Name',
        'Student_ID',
    ];
}
