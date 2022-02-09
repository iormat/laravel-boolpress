@extends('new.layouts.main-layout')
@section('content')
    <h2> All Posts </h2>
    @auth
        <div class="create">
            <button class="btn btn-primary">
                <a href="{{route('create')}}">
                    Create a new post
                </a>
            </button>
        </div>
        <section id="posts">
            @foreach ($posts as $post)
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
                    <div class="categories">
                        <h4>Category&colon; </h4>
                        <p>{{$post -> category -> name}}</p>
                    </div>
                    <div class="article-footer">
                        <h4>Tags&colon;</h4>
                        <p>
                            @foreach ($post -> tags as $tag)
                                {{$tag -> tag_name}}
                            @endforeach
                        </p>
                    </div>
                    <div class="edit">
                        <button class="btn btn-secondary">
                            <a href="{{ route('edit', $post -> id) }}">Edit</a>
                        </button>
                    </div>
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
