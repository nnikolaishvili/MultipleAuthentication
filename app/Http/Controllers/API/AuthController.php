<?php

namespace App\Http\Controllers\API;

use App\AccessToken;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Traits\ResponseTrait;
use App\User;

class AuthController extends Controller
{
    use ResponseTrait;

    public function register(Request $request)
    {
        $requestData = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:4|max:40|unique:users,name',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:40|confirmed',
            'password_confirmation' => 'required|string|min:8|max:40'
        ]);
        if ($validator->fails()) {
            return $this->getJsonError($validator->errors()->first());
        }

        $requestData['password'] = bcrypt($requestData['password']);
        $user = User::create($requestData);

        return $this->getJsonSuccess($user, 'success');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->getJsonError($validator->errors()->first());
        }

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user) {
                $exp_date = Carbon::now()->addMonth(6)->timestamp;
                $token = AccessToken::create([
                    'user_id' => $user->id,
                    'access_token' => AccessToken::generate(),
                    'expires_at' => $exp_date
                ]);
                return $this->getJsonSuccess($token, 'success');
            }
        }
        return $this->getJsonError('Your email or password is not valid. Try again');
    }

    public function logout(Request $request)
    {
        $token = request()->header('Auth');
        $tokenId = AccessToken::where('access_token', $token)->first()->delete();
        return 'Logged Out';
    }
}
