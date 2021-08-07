<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ForgetRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForgetController extends Controller
{
    //
    public function forget(ForgetRequest $request){
        $email = $request->email ;
        $emailTabel = User::where('email',$email);
        if(! isset( $emailTabel)){
            return response([
                'massege' => 'user dosent exsist'
            ]) ;
            $token = Str::random(10);
            try{
                DB::tabel('password_resets')->inseret([
                    'email' =>$email ,
                    'token' =>$token

                ]);
                return response()->json('check your email');
            }catch (\Exception $exception){
                return response([
                    'massege' => $exception->getMessage()
                ]) ;

            }

//send email
        }

    }
}
