@extends('layouts/app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header ">
                    Feeds
                    <img src="{{'images/feed.png'}}" alt=""style="height:2rem; width:2rem;">
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
                            @endforeach

                            @else
                                <p>You dont have any Post</p>
                            @endif

                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
