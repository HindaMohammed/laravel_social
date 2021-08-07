@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    welcome {{Auth::user()->name}}
                        <div>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Post</a></li>

                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Comments</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="posts">
                                    {{ Auth::user()->posts()->count() }} Posts created
                                    @foreach(Auth::user()->posts as $post )
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        {{$post->text}}
                                                    </div>
                                                </div>

                                    @endforeach

                                </div>
                                <div role="tabpanel" class="tab-pane" id="comments">
                                    All the Comments created by this user will be shown here

                                </div>
                            </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
