<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class UserController extends Controller
{
    public function getUser(){
        if(isset($user_id))
            return User::find($user_id);
        return  Auth::user()->id;
    }
//view my data or data other user
    public function profile($id = null){
       // $users = User::where('id',$request->id)->get()->first();
         $user = (isset($id))? User::find($id):auth()->user();
         return  response()->json($user);
    }
    //, `name`, `email`, `password`,
    public function postUser(Request $request)
    {

        $val = Validator::make($request->all(),[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6'

        ]);
        if($val->fails()){
            return response()->json(false);
        }
        $user = new User () ;
        $user->name  =$request->get('name')  ;
        $user->email  =$request->get('email')  ;
        $user->password  =bcrypt($request->get('password') ) ;
        $user->save();
        return response()->json(true);

    }
    public function putUser(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->name  =$request->get('name')  ;
        $user->email  =$request->get('email')  ;
        $user->password  =bcrypt($request->get('password') ) ;
        $user->save();
        return response()->json(true);

    }



}
