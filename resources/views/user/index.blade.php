@extends('layouts.app')

@section('content')
    <form method="post" action="{{url('insertPost')}}">
        {{ csrf_field() }}
        <div class="container">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="panel-body">
                    <div class="form-group  {{ $errors->has('text') ? 'has-error' : '' }} ">
                       <textarea name="text" rows="8" cols="80" class="form-control"
                                 placeholder="Enter your post"></textarea>
                        @if ($errors->has('text'))
                            <small class="text-danger">{{ $errors->first('text') }}</small>
                        @endif
                    </div>

                    <input type="submit" value="Post" class="btn btn-primary btn-block">
                </div>
            </div>
        </div>
    </form>
    @foreach($posts as $post )
        <div class="container">
            <div class=" col-sm-6 col-sm-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Created by {{ $post->user['name'] }}
                        </h3>
                            <div class="pull-right">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                   <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('post.show', [$post->id]) }}">Show Post </a>
                                    </li>
                                    <li>
                                        <a href="{{route('post.edit', [$post->id])}}">edit Post </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="panel-body">
                        {{$post->text}}
                    </div>
                    <div class="panel-footer">
                        <a href="#" class="btn btn-link">like </a>
                        <a href="#" class="btn btn-link">Comment </a>

                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection
