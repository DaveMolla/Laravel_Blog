@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Posts</h1>
    @if (count($posts)>0)   
        @foreach ($posts as $post)
            <div class="card card-body bg-light mb-3">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="asset(“/cover_image/{(Spost-›cover_image}}”)” alt="">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/posts/{{$post->id}}" class="text-decoration-none">{{$post->title}}</h3></a>
                        <p>{{Str::limit($post->body, 150)}}</p>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                        <br><br>
                        <div class="btn-group">
                            @auth
                                @if (!$post->likedBy(auth()->user()))
                                    <form action="{{ route('posts.likes', $post->id) }}" method="post">
                                    @csrf
                                    <button class="btn btn-primary">Like</button>
                                </form>
                                @else
                                <form action="{{ route('posts.likes', $post->id) }}" method="post" style="margin-left: 5px">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">UnLike</button>
                                </form>
                                @endif
                            @endauth
                            <div style="margin-left: 7px; margin-top:4px; font-size:18px">{{ $post->likes->count() }} {{Str::plural('like',$post->likes->count())}}</div>
                            @if (Auth::guest())
                            <p class="text-secondary" style="margin-left: 7px; margin-top:7px;"><a href="{{route('login')}}" class="text-decoration-none">Login</a> to like Posts</p>
                        @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
            <p>No posts found</p>
    @endif
</div>
@endsection
