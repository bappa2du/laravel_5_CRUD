@extends('book.layout')

@section('content')
    <h3 class="alert alert-success text-center">Edit Privilege</h3>
    {!!Form::model($settings,["url"=>"/user/settings-edit/{$settings->id}","method"=>"PUT"])!!}
        <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Username</th>
                        <th colspan="4">Privilege</th>
                    </tr>
                    <tr>
                        <td>{!! $settings->username !!}</td>
                        <td>
                        {!!Form::label('create_book','Create',['class'=>''])!!}
                        {!!Form::checkbox('create_book','create')!!}
                        </td>
                        <td>
                        {!!Form::label('edit_book','Edit',['class'=>''])!!}
                        {!!Form::checkbox('edit_book','edit')!!}
                        </td>
                        <td>
                        {!!Form::label('delete_book','Delete',['class'=>''])!!}
                        {!!Form::checkbox('delete_book','delete')!!}
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