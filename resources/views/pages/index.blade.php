@extends('layouts.app')

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div class="text-center p-5 text-light"
style="background-image: url('https://cdn.pixabay.com/photo/2017/07/31/23/45/pen-2562078_960_720.jpg');
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    height: 500px;
    width:100%;
    margin-top:-10px;">
    <div style="margin-top: 80px">
    <h1>Welcome To Laravel Blog App</h1>
        <p>This is the laravel Blog Application created by Dave</p>
        <a href="admin" class="text-decoration-none text-warning">admin</a>
        <p>Go to <a href="/posts" class="text-decoration-none text-warning">Blog</a> page to see latest posts</p>
        @if (auth()->user() && auth()->user()->is_admin)
        <p>
            <a href="/login" class="btn btn-primary btn-lg" role="button">Login</a>
            <a href="/register" class="btn btn-success btn-lg" role="button">Register</a>
        </p>
        @endif
    </div>
    </div>
    <br><br>
    <div class="container">
    <div class="row">
        <div class="col">
            <img src="https://cdn.pixabay.com/photo/2017/12/12/10/46/laptop-3014396_960_720.jpg" width="100%" alt="">
        </div>
        <div class="col text-center">
            <h2 class="text-lg text-bold ">
                Struggling to be a better web developer?
            </h2>

            <h5 class="text-secondary">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.minima itaque magni error est et

            </h5>

            <h5 class="text-secondary">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. minima itaque magni error est et Quaerat sapiente tenetur deleniti fugit voluptatem,


            </h5>
                <a href="/posts" class="uppercase text-sm btn btn-primary">
                    Find Out More
                </a>        </div>
    </div>
    </div>
      <br>
      <div class="bg-dark text-center text-light"
      style="100%;">
        <h1 class="pb-5">
            I'm an expert in...
        </h1>

            <h3 class="py-1">
                Ux design
            </h3>

            <h3 class="font-15 py-1">
                Project managment
            </h3>

            <h3 class="py-1">
                Digital strategy
            </h3>

            <h3 class="py-1">
                Backend development
            </h3><br>
      </div>
      <br>
      <footer class="bg-light text-center text-lg-start"
      style="width:100%">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2022 DaveDir:
          <a class="text-dark" href="dailyposts">etdailyposts</a>
        </div>
        <!-- Copyright -->
      </footer>

@endsection
