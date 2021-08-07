<?php

namespace App\Http\Controllers\Api;

use App\Friend;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{

    public function friend($id = null){


       // $user = (isset($id))? User::find($id):auth()->user();
        $friends = (isset($id))?Friend::where('user_id',$id):auth()->user();
        return  response()->json($friends);
    }
    public function friendPost(Request $request){
        $friends = User::with('friends')->find('user_id',$request->id);
        return  response()->json($friends);
    }


}
