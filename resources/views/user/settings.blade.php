@extends('book.layout')

@section('content')
    <h3 class="alert alert-success text-center">
        User Privilege || {!! Auth::user()->username !!}
        ({!!HTML::link('/user/logout','Logout',['class'=>''])!!})
    </h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th colspan="3">Privilege</th>
                <th>Action</th>
            </tr>
            @foreach($settings as $item)
            <tr>
                <td>{!! $item->id !!}</td>
                <td>{!! $item->username !!}</td>
                <td>{!! Form::checkbox('Create','create',$item->create_book,['disabled'])!!} Create</td>
                <td>{!! Form::checkbox('Edit','edit',$item->edit_book,['disabled']) !!} Edit</td>
                <td>{!! Form::checkbox('Delete','delete',$item->delete_book,['disabled']) !!} Delete</td>
                <td>{!!HTML::link("/user/settings-edit/{$item->id}",'Edit',['class'=>'btn btn-sm btn-info'])!!}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <p>{!!HTML::link('/book','Book Page',['class'=>''])!!}</p>

@stop