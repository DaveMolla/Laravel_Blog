@extends('layouts.app')

@section('content')
<div class="container">
<a href="/posts" class="btn btn-default bg-light">Go Back</a>
    <h1>{{$posts->title}}</h1>
    <img style="width:100%" src="/cover_image/{{$posts->cover_image}}" alt="">
    <br><br>

    <div>
        {{$posts->body}}
    </div>
    <hr>
    <small>Written on {{$posts->created_at}} by {{$posts->user->name}}</small>
    <div class="btn-group">
        @auth
            @if (!$posts->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $posts) }}" method="post">
                @csrf
                <button class="btn btn-primary">Like</button>
            </form>
            @else
            <form action="{{ route('posts.likes', $posts) }}" method="post" style="margin-left: 5px">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">UnLike</button>
            </form>
            @endif
        @endauth
        <div style="margin-left: 7px; margin-top:4px; font-size:18px">{{ $posts->likes->count() }} {{Str::plural('like',$posts->likes->count())}}</div>
    </div>
    @if (!Auth::guest())
    @if (Auth::user()->id == $posts->user_id)
        <hr> 
        {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $posts->id],'method'=>'POST', 'class'=>''])!!}
            <a href="/posts/{{$posts->id}}/edit" class="btn btn-warning">Edit</a>
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
    @endif
        @endif
        <br><br>
        @comments(['model' => $posts])
    </div>
@endsection