@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 col-sm-offset-3">
   <div class="panel panel-default">
       <div class="panel-body">
           {{ $post->text }}
           <br />
       </div>
       <div class="panel-footer" >
           <a href="#" class="btn btn-link">like </a>
           <a href="#" class="btn btn-link">Comment </a>

       </div>

   </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    All Comments here
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body" style="display: flex ;border-radius: 0;">
                    <input type="text" name="comment" placeholder="Enter your comment "class="form-control" >
                    <input type="submit" value="comment" class="btn btn-primary" style="border-radius: 0;">
                </div>
            </div>
        </div>

    </div>


    </div>


@endsection
