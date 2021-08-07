<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    //
    use SoftDeletes;
    public function post()
    {
        return $this->belongsTo(Post::class,'post_id') ;
    }
    public function comment()
    {
        return $this->belongsTo(Comment::class,'comment_id') ;
    }

}
