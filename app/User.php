<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Arr;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password','images'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [];

    //     'password', 'remember_token',
    // ];

    public function setRandomImage()
    {
        $imageNames = ['icon1.png', 'icon2.png', 'icon3.png', 'icon4.png', 'icon5.png', 'icon6.png', 'icon7.png'];
        $randomImage = Arr::random($imageNames);
        $this->images = $randomImage;
        $this->save();
    }
}
