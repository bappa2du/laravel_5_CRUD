@extends('book.layout')

@section('content')

    <h3 class="text-center alert alert-success">Create View</h3>
    @foreach($errors->all() as $error)
        <p class="alert alert-warning">{!! $error !!}</p>
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
            {!!Form::submit('Submit',['class'=>'form-control btn btn-primary'])!!}
        </div>
    {!!Form::close()!!}

@stop