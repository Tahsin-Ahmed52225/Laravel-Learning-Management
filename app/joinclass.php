<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Course;

class joinclass extends Model
{
    protected $table = "joinclass";
    protected $fillable = [
        'CourseID',
        'Course_Name',
        'Student_ID',
    ];

    public function Course()
    {
        return $this->belongsTo("Course::class");
    }
}
