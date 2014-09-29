@extends('layout')

@section('content')

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

@stop