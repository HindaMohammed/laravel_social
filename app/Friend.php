<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Friend extends Model
{
    use softDeletes;

    public function users()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id');
    }
}
