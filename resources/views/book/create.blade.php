@extends('book.layout')

@section('content')

    <h2>Create View</h2>
    @foreach($errors->all() as $error)
        <p>{!! $error !!}</p>
    @endforeach
    {!!Form::open(['url'=>'book/store'])!!}
        <div class="form-group">
            {!!Form::label('Name','Name',['class'=>''])!!}
            {!!Form::text('name',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('Topic','Topic',['class'=>''])!!}
            {!!Form::text('topic',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::submit('Submit',['class'=>'form-control btn btn-default'])!!}
        </div>
    {!!Form::close()!!}

@stop