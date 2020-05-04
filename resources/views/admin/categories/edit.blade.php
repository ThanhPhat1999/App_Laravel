@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800 text-center">Edit Category</h1>
    <div class="row">
        <div class="col-sm-6">
            {!! Form::model($category, ['method' => 'PATCH', 'action' => ['AdminCategoriesController@update', $category->id]]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Edit Category', ['class' => 'btn btn-warning col-sm-6']) !!}
                </div>
            {!! Form::close() !!}
            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete Category', ['class' => 'btn btn-danger col-sm-6']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection