<?php

namespace App\Http\Controllers;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;

class Basecontroller extends Controller
{


    public function sendresponse($result,$message){
        $response =[
            'success'=> true,
            'data'=> $result,
            'success'=> $message

        ];
        return response()->json($response,200) ;
    }



    public function sendError($error,$errormessage=[],$code=404){
        $response =[
            'success'=> false ,
            'data'=> $error,
        ];
        if (!empty($errormessage)) {
            $response['data']=$errormessage;
        }

        return response()->json($response,$code) ;
    }


















}
