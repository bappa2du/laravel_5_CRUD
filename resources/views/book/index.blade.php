@extends('book.layout')

@section('content')
    @if(Session::has("message"))
        {!! Session::get("message") !!}
    @endif

    <table border="1px">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Topic</th>
            <th colspan="2">Action</th>
        </tr>
        @foreach($book as $item)
        <tr>
            <td>{!! $item->id !!}</td>
            <td>{!! $item->name !!}</td>
            <td>{!! $item->topic !!}</td>
            <td>{!!HTML::link("book/edit/{$item->id}",'Edit',['class'=>''])!!}</td>
            <td>{!!HTML::link("book/delete/{$item->id}",'Delete',['class'=>''])!!}</td>
        </tr>
        @endforeach
    </table>
    <p>
    {!!HTML::link('/book/create','Create New Book',['class'=>''])!!}
    </p>

@stop