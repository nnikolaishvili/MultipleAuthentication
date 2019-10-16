<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use ResponseTrait;

    public function info(Request $request){
        $user=Auth::user();
        if($user){
            return response()->json([
                'Message' => 'Hi, here\'s all about you!',
                'Your ID' => $user->id,
                'Name' => $user->name,
                'Email' => $user->email
            ]);
        }
        return $this->getJsonError('We dont have info about you');
    }

    public function update(Request $request){
        $user=Auth::user();
        $validator = Validator::make(request()->only(['name', 'email']),[
            'name' => 'required|string|min:3|max:30',
            'email' => 'required|string|email'
        ]);
        if ($validator->fails()){
            return $this->getJsonError($validator->errors()->first());
        }

        if($user){
            $user->update(request(['name', 'email']));
            return $user;
        }
        return 'You cant update information';
    }
}
