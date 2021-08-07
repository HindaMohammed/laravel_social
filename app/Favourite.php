<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favourite extends Model
{
    use softDeletes;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id') ;
    }
}
