<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use softDeletes;
    //
    public function user()
    {
        return $this->belongsTo(User::class,'user_id') ;
    }
    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id','id') ;
    }
    public function likes(){
        return   $this -> hasMany(Like::class,'type_id','id')
            ->where('type',0); //type 0 > post
    }

}
