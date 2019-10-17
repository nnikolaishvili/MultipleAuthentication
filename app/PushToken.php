<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PushToken extends Model
{
    protected $fillable = ['user_id', 'device_os', 'push_token', 'access_token_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
