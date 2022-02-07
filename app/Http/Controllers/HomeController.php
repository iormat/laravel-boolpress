<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Post;

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
        return view('new.pages.create');
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
        // create new post
        $post = Post::create($data);
        return redirect() -> route('posts');
    }

}
