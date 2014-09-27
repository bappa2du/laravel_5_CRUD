@extends('book.layout')

@section('content')

   <h2>Edit Book</h2>
    {!!Form::model($book,["url"=>"/book/update/{$book->id}",'method'=>'PUT'])!!}
        <div class="form-group">
            {!!Form::label('name','Name',['class'=>''])!!}
            {!!Form::text('name',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('topic','Topic',['class'=>''])!!}
            {!!Form::text('topic',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::submit('Update',['class'=>'form-control btn btn-default'])!!}
        </div>
    {!!Form::close()!!}

@stop