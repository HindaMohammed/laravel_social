<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function helloWorld(){
        return'hello';
    }

    public function helloWorldPost(Request $request){
        dd($request->all());
//        $validateData = $request->validateWithBag('post',[
//            ''
//        ]);
    }
}
