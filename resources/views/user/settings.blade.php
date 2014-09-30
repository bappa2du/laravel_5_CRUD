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
            @foreach($user as $item)
            <tr>
                <td>{!! $item->id !!}</td>
                <td>{!! $item->username !!}</td>
                <td>{!! Form::checkbox('Create','create',null,['disabled'])!!} Create</td>
                <td>{!! Form::checkbox('Edit','edit',null,['disabled']) !!} Edit</td>
                <td>{!! Form::checkbox('Delete','delete',null,['disabled']) !!} Delete</td>
                <td>{!!HTML::link('/user/settings-edit','Edit',['class'=>'btn btn-sm btn-info'])!!}</td>
            </tr>
            @endforeach
        </table>
    </div>

@stop