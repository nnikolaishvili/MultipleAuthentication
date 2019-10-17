<?php

namespace App\Http\Controllers\API;

use App\AccessToken;
use App\Http\Controllers\Controller;
use App\PushToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Traits\ResponseTrait;

class PushTokenController extends Controller
{
    use ResponseTrait;

    public function store(Request $request)
    {
        $validator = Validator::make($request->only('push_token', 'device_os'), [
            'push_token' => 'required',
            'device_os' => 'required|in:android,ios'
        ]);
        if ($validator->fails()) {
            return $this->getJsonError($validator->errors()->first());
        }

        $requestData = $request->only('push_token', 'device_os');
        $UserId = Auth::id();
        $accessToken = $request->header('Auth');
        $accessTokenId = AccessToken::where('access_token', $accessToken)->first()->id;
        $pushToken = PushToken::where('push_token', $requestData['push_token'])->first();
        if ($pushToken) {
            $pushToken->update([
                'access_token_id' => $accessTokenId,
                'user_id' => $UserId
            ]);
        } else {
            PushToken::updateOrCreate([
                'access_token_id' => $accessTokenId,
                'user_id' => $UserId,
                'push_token' => $requestData['push_token'],
                'device_os' => $requestData['device_os']
            ]);
        }
        return $this->getJsonSuccess([], 'Successfully set push token');
    }

    public function delete(Request $request)
    {
        $validation = Validator::make($requestData = $request->only('push_token'), [
            'push_token' => 'required|string',
        ]);
        if ($validation->fails()) {
            return $this->getJsonError($validation->errors()->first());
        }

        $accessToken = $request->header('Auth');
        $accessTokenId = AccessToken::where('access_token', $accessToken)->first()->id;
        $pushToken = PushToken::where('push_token', $requestData['push_token'])
            ->where('access_token_id', $accessTokenId)
            ->first();

        if ($pushToken) {
            $pushToken->delete();
            return $this->getJsonSuccess([], 'Successfully deleted push token');
        }
        return $this->getJsonError('Push token not found');
    }
}
