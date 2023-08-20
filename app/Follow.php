<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = ['following_id', 'followed_id'];

    public function followingUser()
    {
        return $this->belongsTo(User::class, 'following_id');
    }

    public function followedUser()
    {
        return $this->belongsTo(User::class, 'followed_id');
    }
}
