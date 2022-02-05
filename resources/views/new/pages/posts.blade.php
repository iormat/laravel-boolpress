@extends('new.layouts.main-layout')
@section('content')
    <h2> All Posts </h2>
    <section id="new-post">
        <button class="btn btn-primary">
            <a href="">
                Create a new post
            </a>
        </button>
    </section>
    <section id="posts">
        @foreach ($posts as $post)
            <article class="post">
                <div class="article-header">
                    <div class="user-img">
                        <img src="{{ $post -> profile_pic }}" alt="{{ $post -> author }}">
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
                    <img src="{{ $post -> post_image }}" alt="{{$post -> title}}">
                    <p>{{ $post -> content }}</p>
                </div>
            </article>
        @endforeach
    </section>
@endsection
