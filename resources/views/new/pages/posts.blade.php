@extends('new.layouts.main-layout')
@section('content')
    <h2> All Posts </h2>
    @auth
        <div class="create">
            <div class="row mb-4 justify-content-center">
                <div class="col-2">
                    <button class="btn btn-primary">
                        <a href="{{route('create')}}">
                            Create a new post
                        </a>
                    </button>
                </div>
            </div>
        </div>
        <section id="posts">
            @foreach ($data['posts'] as $post)
                <article class="post">
                    <div class="article-header">
                        <div class="user-img">
                            @if ($post -> profile_pic)
                                <img src="{{ $post -> profile_pic }}" alt="{{ $post -> author }}">
                            @endif
                            <span>
                                <h4>
                                    {{$post -> author}}
                                </h4>
                                {{$post -> publish_date}}
                            </span>
                        </div>
                        <div class="post-info">
                            <h3>{{$post -> title}}</h3>
                            <p>{{$post -> subtitle}}</p>
                        </div>
                    </div>
                    <div class="article-body">
                        @if ($post -> post_image)
                            <img src="{{ $post -> post_image }}" alt="{{$post -> title}}">
                        @endif
                        <p>{{ $post -> content }}</p>
                    </div>
                    <span>Category: {{$post -> category -> name}}</span>
                </article>
            @endforeach
        </section>
        @else
        <div class="unlogged">
            <h2>User not logged in </h2>
            <h3><a href="{{route('index')}}">Login</a></h3>
        </div>
    @endauth
@endsection
