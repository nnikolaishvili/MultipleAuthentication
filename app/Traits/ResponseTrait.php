<?php

namespace App\Traits;

trait ResponseTrait{
     public function getJsonError($message, $code = 2){
         return response()->json([
             'code' => $code,
             'message' => $message
         ], 400);
     }

    public function getJsonSuccess($data, $message, $code = 1){
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ], 200);
    }
}

