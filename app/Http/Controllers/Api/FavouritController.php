<?php

namespace App\Http\Controllers\Api;

use App\Favourite;
use App\Post;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavouritController extends Controller
{
    public function addFavourit(Request $request){
        //$user =Auth::user()->id;
        $post = Post::where('id',$request->user_id )->get()->first();
        $favourite = new Favourite();
        $favourite->user_id = $request->user_id;
        $favourite->post_id = $request->post_id;
        $favourite->save();

        return response()->json($post->text);
    }
    public function favouritePost2($id = null){
        $favouritePost = (isset($id))? Post::with('users')->find($id ,'user_id')->get()->first()
            :auth()->user();
        return response()->json($favouritePost);

       // dd($favouritePost->text);
//        $user = (isset($id))? Post::find($id):auth()->user();
//        where('id',$user )->get()->first();
//        $user = (isset($id))? Post::where('id',$user )->get()->first():auth()->user();
//        return  response()->json($user);
    }
//    public function favouritePost(Request $request){
//        $user = User::with(['favourite' => function($q){
//            $q ->with('post');}
//            ])->find($request->id);
//        return response()->json($user);
//
//        }
    public function favouritePost($id = null){

        if(isset($id))

            $favourite = Favourite::where('id','user_id' )->get()->first();
        else
            $favourite= Favourite::where('user_id',Auth::user()->id )->get()->first();
            $post = Post::where('id',$favourite->post_id)->get()->first();
        return response()->json(['status'=>true,'message'=> trans('admin.success'),'items'=> [
            'text'=>$post->text ,

        ]]);
//        return [
//            'id' =>  $post->post_id,
////            'name' => $this->name,
////            'email' => $this->email,
////            'created_at' => $this->created_at,
////            'updated_at' => $this->updated_at,
//        ];



    }








}
