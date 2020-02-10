@extends('layouts/app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(session('response'))
            <div class="alert alert-sucess" style="background-color:green; color:black;">{{ session('response')}}</div>
            @endif
            <div class="card">
                <div class="card-header ">
                    <img src="{{ url('images/feed.png')}}" alt=""style="height:2rem; width:2rem;">
                </div>

                <div class="card-body d-flex">
                    <div class="card col-md-4"  style="border:transparent">
                        <ul class="list-group">
                            @if(count($categories) > 0)
                                @foreach( $categories->all() as $category)
                                <li class="list-group-item"><a href='{{url("category/{$category->id}")}}'>{{$category->category}}</a></li>
                                @endforeach
                                @else
                                <p>No Category Found</p>
                            @endif

                        </ul>
                        </div>

                        <div class="card col-md-8" style="border:transparent">
                            @if(count($posts) > 0)

                            @foreach($posts->all() as $post)
                                <h4 class="card-title card-text-center">{{ $post->post_title}}</h4>
                                <img src="{{ $post->post_image}}" alt="" style="height:14rem;">
                                <p>{{ $post->post_body }}</p>

                                <ul class="nav nav-pils " style="float:right;">
                                    <li role="presentation">
                                       <a href='{{url("/like/{$post->id}")}}' class="p-2">
                                            <span class="fas fa-heart">Like ({{$likeCtr}})</span>
                                       </a>
                                    </li>

                                    <li role="presentation">
                                    <a href='{{url("/dislike/{$post->id}")}}' class="p-2">
                                            <span class="fa fa-thumbs-down">Dislike ({{$dislikeCtr}})</span>
                                       </a>
                                    </li>

                                    <li role="presentation">
                                    <a href='#' class="p-2">
                                            <span class="fa fa-comment">comment</span>
                                       </a>
                                    </li>
                                </ul>
                                </ul>

                            @endforeach

                            @else
                                <p>You dont have any Post</p>
                            @endif
                            <hr>
                            <h5 class="text-center" style="color:#3490dc;">Comments</h5>
                            <hr>
                            @if(count($comments) > 0)

                            @foreach($comments->all() as $comments)
                            <div class="panel panel-primary" style="border:1px solid #3490dc;color:#3490dc; border-top-right-radius:12px; border-top-left-radius:12px;border-bottom-left-radius:12px">
                            <p style="padding:3px"> {{ $comments->comments }}</p>
                                <cite style="border-radius: 30px; border:1px #3490dc; padding: 3px;"> by {{ $comments->name }}</cite>
                            </div>
                                <hr>
                            @endforeach

                            @else
                                <p>You dont have any Post</p>
                            @endif

                            <form action='{{ url("/comment/{$post->id}")}}' method="post">
                            @csrf
                            <div class="form-group">

                            <div class="form-group">
                                <textarea id="comment" rows="8" class="form-control" name="comment" required autocomplete="comment"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-large btn-block" >
                                  Comment
                                </button>
                            </form>
                                                     </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
