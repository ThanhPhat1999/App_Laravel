@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800 text-center">Edit User</h1> 
    <div class="col-sm-3">
        <img  src="{{ $users->photo ? $users->photo->path : "http://placehold.it/200x200" }}" alt="" class="img-responsive img-rounded">
    </div>
    <div class="col-sm-9">
        {!! Form::model($users, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $users->id], 'files' => true]) !!}
        {{-- Name --}}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', $users->name, ['class' => 'form-control']) !!}
        </div>
        {{-- Email --}}
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', $users->email, ['class' => 'form-control']) !!}
        </div>
        {{-- Role --}}
        <div class="form-group">
            {!! Form::label('role_id', 'Role:') !!}
            {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id', 'Image:') !!}
            {!! Form::file('photo_id', ['class' => 'form-control']) !!}
        </div>
        {{-- Password --}}
        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        {{-- Status --}}
        <div class="form-group">
            {!! Form::label('is_active', 'Status:') !!}
            {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), $users->is_active, ['class' => 'form-control']) !!}
        </div>
        {{-- Publish Button --}}
        <div class="form-group">
            {!! Form::submit('Publish', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    @include('admin.includes.form_error')
@endsection

