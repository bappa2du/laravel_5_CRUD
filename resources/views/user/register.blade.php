@extends('book.layout')

@section('content')
    <h3 class="alert alert-success">Registration Form</h3>
    @if(Session::has("message"))
        <p class="alert alert-success text-center">{!! Session::get("message") !!}</p>
    @endif
    {!!Form::open()!!}
        <div class="form-group">
            {!!Form::label('username','Username',['class'=>''])!!}
            {!!Form::text('username',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('password','Password',['class'=>''])!!}
            {!!Form::password('password',['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('confirm_password','Confirm Password',['class'=>''])!!}
            {!!Form::password('confirm_password',['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::submit('Register',['class'=>'form-control btn btn-info'])!!}
        </div>
    {!!Form::close()!!}
    <p>Already registered {!!HTML::link('/user/login','Login',['class'=>''])!!}</p>

@stop