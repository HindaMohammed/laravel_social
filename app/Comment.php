<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    //
    use softDeletes;
    public function post()
    {
        return $this->belongsTo(Post::class,'post_id') ;
    }
    public function likes(){
        return   $this -> hasMany(Like::class,'type_id','id')
            ->where('type',1); //type 1 > comment
    }



}
