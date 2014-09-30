@extends('book.layout')

@section('content')
    <h3 class="alert alert-success text-center">Edit Privilege</h3>
    {!!Form::open()!!}
        <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Username</th>
                        <th colspan="4">Privilege</th>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>
                        {!!Form::label('create','Create',['class'=>''])!!}
                        {!!Form::checkbox('create','create',null)!!}
                        </td>
                        <td>
                        {!!Form::label('edit','Edit',['class'=>''])!!}
                        {!!Form::checkbox('edit','edit',null)!!}
                        </td>
                        <td>
                        {!!Form::label('delete','Delete',['class'=>''])!!}
                        {!!Form::checkbox('delete','delete',null)!!}
                        </td>
                        <td>
                        {!!Form::submit('Update',['class'=>'btn btn-sm btn-warning'])!!}
                        </td>
                    </tr>
                </table>
            </div>
    {!!Form::close()!!}
    {!!HTML::link('/user/settings','Back',['class'=>''])!!}


@stop