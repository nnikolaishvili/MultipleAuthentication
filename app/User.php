<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function AccessTokens(){
        return $this->hasMany(AccessToken::class);
    }

    public function PushTokens(){
        return $this->hasMany(PushToken::class);
    }

    public function Posts(){
        return $this->hasMany(Post::class);
    }

    public function Fligths(){
        return $this->hasMany(Flight::class, 'buyer_id', 'id');
    }

}
