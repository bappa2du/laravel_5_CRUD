@extends('book.layout')

@section('content')

   <h3 class="text-center alert alert-success">Edit Book</h3>
   @foreach($errors->all() as $error)
    <p class="alert alert-warning">{!! $error !!}</p>
   @endforeach
    {!!Form::model($book,["url"=>"/book/update/{$book->id}",'method'=>'PUT'])!!}
        <div class="form-group">
            {!!Form::label('id','Id',['class'=>''])!!}
            {!!Form::text('id',null,['class'=>'form-control','disabled'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('name','Name',['class'=>''])!!}
            {!!Form::text('name',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('topic','Topic',['class'=>''])!!}
            {!!Form::text('topic',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::submit('Update',['class'=>'form-control btn btn-primary'])!!}
        </div>
    {!!Form::close()!!}

@stop