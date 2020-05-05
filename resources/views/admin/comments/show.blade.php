@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800 text-center">Post Comments</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Content</th>
                    <th>View Post</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if (count($comments) > 0)
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->author }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->content }}</td>
                            <td><a class="btn btn-primary" href="{{ route('post.blog', $comment->post->id) }}">View Post</a></td>
                            <td>
                                @if ($comment->is_active === 1)
                                    {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}
                                        <input type="hidden" name="is_active" value="0">
                                        <div class="form-group">
                                            {!! Form::submit('Unapproved', ['class' => 'btn btn-info col-sm-10']) !!}
                                        </div>
                                    {!! Form::close() !!}
                                @else
                                    {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}
                                        <input type="hidden" name="is_active" value="1">
                                        <div class="form-group">
                                            {!! Form::submit('Approved', ['class' => 'btn btn-info col-sm-10']) !!}
                                        </div>
                                    {!! Form::close() !!}
                                @endif
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'action' => ['PostCommentsController@destroy', $comment->id]]) !!}
                                    <div class="form-group">
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger col-sm-10']) !!}
                                    </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    
                @endif
            </tbody>
        </table>
    </div>
@endsection

