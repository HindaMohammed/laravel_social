<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
//**
//to use the data of auth
use Illuminate\Support\Facades\Auth;





class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =Post::all()->sortByDesc('id');
        return  view('user.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'text' => 'required|max:255'
        ]);
        $user =Auth::user()->id;
        $post = new Post();
        $post->text = $request->get('text');
        $post->user_id = $user;
        $post->save();
        return   redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        //return  view('user.index',compact('posts'));
        return view('user.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::find($id);
        if(Auth::user()->id = $post->user_id){
            return view('user.edit'  ,compact('post'));

        }
        return redirect()->back();


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'text' => "required|max:255|unique:posts,text,$id"
        ]);
        $user =Auth::user()->id;
        $post =  Post::find($id);
        $post->text = $request->get('text');
        $post->user_id = $user;
        $post->save();
        return   redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
