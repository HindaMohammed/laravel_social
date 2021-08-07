<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //add post
//    public function addPost(Request  $request){
//        $user =Auth::user()->id;
//        $post = new Post();
//        $post->text = $request->get('text');
//        $post->user_id = $user;
//        $post->save();
//        return response()->json($post);
//    }
    public function addPost(Request  $request){
        $post = new Post();
        $post->text = $request->get('text');
        $post->user_id = $request->user_id;
        $post->save();
        return response()->json($post);
    }

  //get post page
    public function postPostpage(Request  $request){
        $post = Post::with(['user','comments','likes'])->find($request->id);
        return response()->json($post);

   return 'true';
    }
    //get all post
    public function timeLine(){
        $post = Post::get();
        return response()->json($post);
    }



}
