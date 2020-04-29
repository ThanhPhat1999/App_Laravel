@extends('layouts.admin')

@section('content')
    @if(session()->has('delete_message'))
        <p class="bg-danger text-white">{{ session('delete_message') }}</p>
    @endif
    <h1 class="h3 mb-4 text-gray-800 text-center">Welcome to Users</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if ($users)
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td><img height="50" src="{{ $user->photo ? $user->photo->path : 'http://placehold.it/400x400' }}" alt="user photo" class="img-responsive img-rounded rounded mx-auto d-block"></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td>{{ $user->updated_at->diffForHumans() }}</td>
                            <td><a href="{{ route('users.edit', $user->id) }}">Edit</a></td>
                            <td><a href="{{ route('users.edit', $user->id) }}">Delete</a></td>
                        </tr>
                    @endforeach
                @endif 
            </tbody>
        </table>
    </div>
@endsection