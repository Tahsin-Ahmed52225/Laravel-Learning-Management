<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = "commment";
    protected $fillable = [
        'content',
        'Post_ID',
        'writter_ID',
    ];

    public function post()
    {
        return $this->belongsTo("post::class", "Post_ID");
    }
}
