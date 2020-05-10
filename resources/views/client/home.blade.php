@extends('layouts.client')

@section('content')
    @if ($posts)
        @foreach ($posts as $post)
            <!-- First Blog Post -->
            <h2>
                <a href="{{ route('post.blog', $post->slug) }}">{{ $post->title }}</a>
            </h2>
            <p class="lead">
                by <a href="index.php">{{ $post->user->name }}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at->diffForHumans() }}</p>
            <hr>
            <img class="img-responsive" src="{{ $post->photo ? $post->photo->path : "http://placehold.it/900x300" }}" alt="">
            <hr>
            <p>{!! $post->content !!}</p>
            <a class="btn btn-primary" href="{{ route('post.blog', $post->slug) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
        @endforeach
        <div class="row">
            <div class="text-center">
                {{ $posts->render() }}
            </div>
        </div>
    @endif
    
@endsection
