<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function postcomment(Request $request){

        //`text`, user_id, post_id,
        $val= Validator :: make($request->all(),[
            'text'=> 'required',
            'user_id'=> 'required',
            'post_id'=> 'required'
        ]);
        if($val->fails()){
            return response()-> json(['status'=>false,'message'=>trans('admin.error'),'items'=>$val->errors()]);
        }
        $user=new Comment();
        //dd($request->all());
        $user-> text =$request -> get('text');
        $user-> user_id=$request -> get('user_id');
        $user-> post_id =$request -> get('post_id');
        $user->save();
        return response()-> json(['status'=>true,'message'=>trans('admin.success'),'items'=>$user]);
    }
}
