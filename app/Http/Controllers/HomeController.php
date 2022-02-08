<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Post;
use App\Category;
use App\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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

}
