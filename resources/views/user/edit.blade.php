@extends('layouts.app')
{{--, 'route' => ['post.update', $post->id]--}}
@section('content')
    {!! Form::model($post, ['method' => 'PUT', 'files' => true]) !!}
{{--    <form method="put" action="{{url('insertPost')}}">--}}
{{--        {{ csrf_field() }}--}}
        <form>
            <div class="container">
                <div class="col-sm-6 col-sm-offset-3">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group  {{ $errors->has('text') ? 'has-error' : '' }} ">
                                {{ Form::textarea('text', null, ['class' => 'form-control', 'placeholder' => 'Enter your post body']) }}

                                @if ($errors->has('text'))
                                    <small class="text-danger">{{ $errors->first('text') }}</small>
                                @endif
                            </div>

                            <input type="submit" value="Post" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </div>
            </div>
    {!! Form::close() !!}
{{--        </form>--}}
@endsection
