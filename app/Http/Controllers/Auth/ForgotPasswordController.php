<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

   //override to this method to forget password
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json(['status'=>false,'message'=>__($response)]);
    }

    protected function sendResetLinkResponse($response)
    {
       // return response(true);
        return response()->json(['status'=>true,'message'=>__($response)]);
    }

}
