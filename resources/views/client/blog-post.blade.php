 @extends('layouts.client')

 @section('content')
 <div id="fb-root"></div>
 <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=233314384610187&autoLogAppEvents=1"></script>
    <!-- Title -->
    <h1>{{ $post->title }}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{ $post->user->name }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at->diffForHumans() }}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{ $post->photo ? $post->photo->path : $post->photoPlaceholder() }}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{!! $post->content !!}</p>

    <hr>

    <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5" data-width="100%"></div>
 @endsection

 
 
