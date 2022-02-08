<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class GuestController extends Controller
{
    public function index() {
        return view('new.pages.index');
    }

    public function posts() {
        $posts = Post::orderBy('publish_date', 'DESC') -> get();
        return view('new.pages.posts', compact('posts'));
    }
}
