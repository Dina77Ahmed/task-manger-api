<?php

namespace App\Traits;

trait HttpResponses{

    public function success($data,$message=null,$code=200){
        return response()->json([
            'status'=>'success message',
            'data'=>$data,
            'message'=>$message,

        ]);
    }

    public function error($data,$message=null,$code){
        return response()->json([
            'status'=>'Error message',
            'data'=>$data,
            'message'=>$message,

        ],$code);
    }
}