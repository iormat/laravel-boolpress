<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Carbon\Carbon;
use App\Tag;


class GuestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function posts() {
        $posts = Post::orderBy('publish_date', 'DESC') -> get();
        return view('new.pages.posts', compact('posts'));
    }

    public function create() {
        $categories = Category::all();
        $tags = Tag::all();
        return view('new.pages.create', compact('categories', 'tags'));
    }

    public function store(Request $request) {
        $data = $request -> validate([
            'title' => 'required|string|max:60',
            'subtitle' => 'nullable|string|max:60',
            'content' => 'nullable|string|max:200'
        ]);

        // get current user
        $data['author'] = Auth::user() -> name;
        // get current date
        $publishDate = Carbon::now();
        $data['publish_date'] = $publishDate -> toDateString();
        $post = Post::make($data);

        // create new post
        $category = Category::findOrFail($request -> get('categories'));
        $post -> category() -> associate($category);
        $post -> save();

        // get tag value
        $tag = Tag::findOrFail($request -> get('tags'));
        $post -> tags() -> attach($tag);

        $post -> save();
        return redirect() -> route('posts');
    }

    public function edit($id) {
        $categories = Category::all();
        $tags = Tag::all();

        $post = Post::findOrFail($id);
        return view('new.pages.edit', compact('categories', 'tags', 'post'));
    }

    public function update(Request $request, $id) {
        $data = $request -> validate([
            'title' => 'required|string|max:60',
            'subtitle' => 'nullable|string|max:60',
            'content' => 'nullable|string|max:200'
        ]);

        $data['author'] = Post::findOrFail($id) -> author;
        // get current date
        $publishDate = Carbon::now();
        $data['publish_date'] = $publishDate -> toDateString();

        $post = Post::findOrFail($id);
        $post = Post::make($data);

        // create new post
        $category = Category::findOrFail($request -> get('categories'));
        $post -> category() -> associate($category);
        $post -> save();

        // get tag value
        $tag = Tag::findOrFail($request -> get('tags'));
        $post -> tags() -> sync($tag);

        $post -> save();
        return redirect() -> route('posts');

    }

}
