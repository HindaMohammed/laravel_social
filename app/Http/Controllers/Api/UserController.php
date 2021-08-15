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
    public function getUser($user_id = null){
        if(isset($user_id))
            $user = User::find($user_id);
        else
            $user= Auth::user();
        return response()->json(['status'=>true,'message'=> trans('admin.success'),'items'=>[
            'user'=>$user
        ]]);

    }
//view my data or data other user
    public function profile($id = null){
       // $users = User::where('id',$request->id)->get()->first();
         $user = (isset($id))? User::find($id):auth()->user();
        return response()->json(['status'=>true,'message'=> trans('admin.success'),'items'=>$user ]);

    }
    //, `name`, `email`, `password`,
    public function postUser(Request $request)
    {

        $val = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6'

        ]);
        if($val->fails()){
            //return response()->json(false);
            return response()-> json(['status'=>false,'message'=>trans('admin.error'),'items'=>$val->errors()]);
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
        $val = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6'

        ]);
        if($val->fails()){
            return response()-> json(['status'=>false,'message'=>trans('admin.error'),'items'=>$val->errors()]);
        }
        $user = User::find(auth()->user()->id);
        $user->name  =$request->get('name')  ;
        $user->email  =$request->get('email')  ;
        $user->password  =bcrypt($request->get('password') ) ;
        $user->save();
       // return response()->json(true);
        return response()->json(['status'=>true,'message'=> trans('admin.success'),'items'=>$user ]);

    }
    public function deleteUser(Request $request){
        $user = User::find($request->get('user_id'));
        if(isset($user)) {
            $user->delete();
            return response()->json(['status'=>true,'message'=> trans('admin.success')]);
        }return response()->json(['status'=>false,'message'=> trans('admin.error')]);



    }



}
