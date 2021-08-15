<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimeLineController extends Controller
{
    public function timeline(Request $request){
        $limit = 10 ;
        $currentPage = $request->currentPage;
        $count = Post::count();

        $offset = ($currentPage - 1) * $limit;
        $numberOfPages = (int) ceil($count / $limit);
        // return response()->json($numberOfPages );

        $data = Post::skip($offset)->take($limit)->get();

        return response()->json($data);
    }
}
