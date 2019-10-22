<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Zend\Diactoros\Request;
use App\Traits\ResponseTrait;

class PostsController extends Controller
{
    use ResponseTrait;

    public function insert(Request $request){
        $userId = Auth::id();
        $validator = Validator::make($requestData = request()->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'commentsAmount' => 'required|int'
        ]);
        if($validator->fails()){
            return $this->getJsonError($validator->errors()->first());
        }

        $requestData['user_id'] = $userId;
        $post = Post::create($requestData);

        return $this->getJsonSuccess($post, 'success');
    }

}













