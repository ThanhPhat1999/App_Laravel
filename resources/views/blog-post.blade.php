 @extends('layouts.client')

 @section('content')
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
    <img class="img-responsive" src="{{ $post->photo->path }}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{!! $post->content !!}</p>

    <hr>

    <!-- Blog Comments -->
    @if (Auth::check())
         <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
            {!! Form::open(['method' => 'POST', 'action' => 'PostCommentsController@store']) !!}
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                    {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => 3]) !!}
                </div>
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>

        <hr>
    @endif
   

    <!-- Posted Comments -->
    @if (count($comments) > 0)
        @foreach ($comments as $comment)
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="{{ Auth::user()->gravatar }}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{ $comment->author }}
                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                    </h4>
                    {{ $comment->content }}

                    <!-- Nested Comment -->
                    @if (count($comment->replies) > 0)
                        @foreach ($comment->replies as $reply)
                            @if ($reply->is_active === 1)
                                <div class="nested media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{ $reply->author }}
                                            <small>{{ $reply->created_at->diffForHumans() }}</small>
                                        </h4>
                                        {{ $reply->content }}
                                    </div>
                                    <div class="comment-reply-container">
                                        <a  class="toggle-reply pull-right">Reply</a>
                                        <div class="comment-reply">
                                            {!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@createReply']) !!}
                                                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                                                <div class="form-group">
                                                    {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => 1]) !!}
                                                </div>
                                                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                     @endif
                     <!-- End Nested Comment -->
                </div>
            </div>
        @endforeach
    @endif
    

    <!-- Comment -->
    {{-- <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            <!-- Nested Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Nested Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            <!-- End Nested Comment -->
        </div>
    </div> --}}
 @endsection

 @section('script')
    <script>
        $(".comment-reply-container .toggle-reply").click(function(){
            $(this).next().slideToggle("slow");
        });
    </script>
 @endsection
 
