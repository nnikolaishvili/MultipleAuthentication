<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccessToken extends Model
{

    protected $fillable = [
        'id', 'user_id', 'access_token', 'expires_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generate()
    {
        return Hash::make(Str::random(100));
    }

    public static function checkToken($token)
    {
        $model = AccessToken::where('access_token', $token)
            ->where('expires_at', '>', time())
            ->first();

        if ($model) {
            AccessToken::where('access_token', $token)->update(['expires_at' => strtotime('+1 Month')]);
//            auth()->login(User::where('id', $model->user_id)->first());
            auth()->loginUsingId($model->user_id);
        } else {
            auth()->logout();
        }

        return true;
    }
}
