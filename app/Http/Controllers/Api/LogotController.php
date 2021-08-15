<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogotController extends Controller
{
    //
    public function logout(Request $request){
        $token = $request->user()->token();
        $token->revoke();
        $response = ["you have successfully logout !"];
        return response( $response,200);



        }

    }

