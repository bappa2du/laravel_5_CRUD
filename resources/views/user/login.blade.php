@extends('book.layout')

@section('content')
    <p class="alert alert-success">Login Form</p>
    {!!Form::open(['url'=>'user/login','method'=>'POST'])!!}
        <div class="form-group">
            {!!Form::label('username','Username',['class'=>''])!!}
            {!!Form::text('username',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('password','Password',['class'=>''])!!}
            {!!Form::password('password',['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::submit('Submit',['class'=>'form-control btn btn-primary'])!!}
        </div>
    {!!Form::close()!!}
    <p>Not Registered yet please {!!HTML::link('/user/register','Register',['class'=>''])!!}</p>

@stop