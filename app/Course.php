<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\joinclass;

class Course extends Model
{
    protected $table = "class";

    protected $fillable = [
        'Course_name',
        'Course_code',
        'Course_teacher',
        'Course_key',
    ];

    public function joinclass()
    {
        return $this->hasMany("App\joinclass");
    }
    public function post()
    {
        return $this->hasMany("App\class");
    }
}
