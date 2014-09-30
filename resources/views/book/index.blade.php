@extends('book.layout')

@section('content')

    <h3 class="text-center alert alert-success">
        Book List || {!! Auth::user()->username !!}
        ({!!HTML::link('/user/logout','Logout',['class'=>''])!!})
    </h3>

    @if(Session::has("message"))
       <p class="alert alert-info">{!! Session::get("message") !!}</p>
    @endif

    <div class="table-responsive">
    <table class="table table-bordered table-striped">
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
                <td>{!!HTML::link("book/edit/{$item->id}",'Edit',['class'=>'btn btn-info'])!!}</td>
                <td>{!!HTML::link("book/delete/{$item->id}",'Delete',['class'=>'btn btn-danger'])!!}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <p>
    {!!HTML::link('/book/create','Create New Book',['class'=>'btn btn-info'])!!}
    @if(Auth::user()->username == 'admin')
    {!!HTML::link('/user/settings','User Settings',['class'=>'pull-right btn btn-warning'])!!}
    @endif
    </p>

@stop