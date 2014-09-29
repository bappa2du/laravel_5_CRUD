@extends('book.layout')

@section('content')
    <p class="alert alert-success">Login Form</p>
    @if(Session::has("message"))
        <p class="alert alert-info">{!! Session::get("message") !!}</p>
    @endif
    @if(Session::has("mismatch"))
        <p class="alert alert-danger">{!! Session::get("mismatch") !!}</p>
    @endif
    @foreach($errors->all() as $error)
            <p class="alert alert-warning">{!! $error !!}</p>
    @endforeach
    {!!Form::open(['url'=>'user/login'])!!}
        <div class="form-group">
            {!!Form::label('username','Username',['class'=>''])!!}
            {!!Form::text('username',null,['class'=>'form-control','required'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('password','Password',['class'=>''])!!}
            {!!Form::password('password',['class'=>'form-control','required'])!!}
        </div>
        <div class="form-group">
            {!!Form::submit('Submit',['class'=>'form-control btn btn-primary'])!!}
        </div>
    {!!Form::close()!!}
    <p>Not Registered yet please {!!HTML::link('/user/register','Register',['class'=>''])!!}</p>

@stop