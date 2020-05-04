@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800 text-center">Welcome to Media</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Created</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if ($photos)
                    @foreach ($photos as $photo)
                        <tr>
                            <td>{{ $photo->id }}</td>
                            <td><img height="50" src="{{ $photo->path }}" alt=""></td>
                            <td>{{ $photo->created_at->diffForHumans() }}</td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediasController@destroy', $photo->id]]) !!}
                                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
