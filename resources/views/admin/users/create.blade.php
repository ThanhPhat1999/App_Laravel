@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800 text-center">Create User</h1> 
    {!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store']) !!}
    <div class="form-group">
        {!! Form::label('name_user', 'Your name:') !!}
        {!! Form::text('name_user', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email_user', 'Your email:') !!}
        {!! Form::email('email_user', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role_user', 'Your role:') !!}
        {!! Form::select('role_user', ['' => 'Choose Options'] + $roles, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password_user', 'Your password:') !!}
        {!! Form::password('password_user', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('is_active', 'Your email:') !!}
        {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), 0, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Publish', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection