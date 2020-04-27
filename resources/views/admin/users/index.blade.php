@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800 text-center">Welcome to Users</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    {{-- <th>Role</th> --}}
                    <th>Status</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @if ($users)
                        @foreach ($users as $user)
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->name }}</td>
                            {{-- <td>{{ $user->role->name }}</td> --}}
                            <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td>{{ $user->updated_at->diffForHumans() }}</td>
                        @endforeach
                    @endif 
                </tr>
            </tbody>
        </table>
    </div>
@endsection