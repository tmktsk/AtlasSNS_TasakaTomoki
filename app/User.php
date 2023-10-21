<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Support\Arr;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'mail',
        'password',
        'images'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [];

    //     'password', 'remember_token',
    // ];

    // public function setRandomImage()
    // {
    //     $imageNames = ['icon1.png', 'icon2.png', 'icon3.png', 'icon4.png', 'icon5.png', 'icon6.png', 'icon7.png'];
    //     $randomImage = Arr::random($imageNames);
    //     $this->images = 'images/' . $randomImage;
    //     $this->save();
    // }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($user) {
    //         if (empty($user->images)) {
    //             // imagesカラムが空の場合、ランダムなアイコン画像を選んで保存する
    //             $icons = ['icon1.png', 'icon2.png', 'icon3.png', 'icon4.png', 'icon5.png', 'icon6.png', 'icon7.png'];
    //             $randomIcon = $icons[array_rand($icons)];
    //             $user->images = $randomIcon;
    //         }
    //     });
    // }

    public function follows()
    {
        return $this->hasMany(Post::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }

    public function isFollowing($datauser)
    {
        return $this->following()->where('followed_id', $datauser->id)->count() > 0;
    }
}
