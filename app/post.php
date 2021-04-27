<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = "post";
    protected $fillable = [
        'content',
        'CourseID',
        'writter_ID',
    ];
    public function Course()
    {
        return $this->belongsTo("App\Course");
    }
    public function comment()
    {
        return $this->hasMany("App\comment", "id");
    }
}
