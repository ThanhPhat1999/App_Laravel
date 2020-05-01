@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800 text-center">Edit Post</h1>
    <img height="100"  src="{{ $post->photo ? $post->photo->path : "http://placehold.it/400x400" }}" alt="" class="img-responsive img-rounded rounded mx-auto d-block">
    {!! Form::model($post, ['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files' => 'true']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>    
        <div class="form-group">
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id', $category, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id', 'Image:') !!}
            {!! Form::file('photo_id', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Description') !!}
            {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => 3]) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Edit Post', ['class' => 'btn btn-warning']) !!}
        </div>
    {!! Form::close() !!}
    @include('admin.includes.form_error')
@endsection