@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            {!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
            </div>  
            {!! Form::close() !!}
        </div>
        <div class="col-sm-6">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($categories)
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at->diffForHumans() }}</td>
                                    <td><a href="{{ route('categories.edit', $category->id) }}">Edit</a></td>
                                    <td><a href="{{ route('categories.edit', $category->id) }}">Delete</a></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection