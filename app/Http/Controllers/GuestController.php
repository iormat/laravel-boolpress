<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class GuestController extends Controller
{
    public function index() {
        return view('new.pages.index');
    }

    public function posts() {

        $posts = Post::all();
        return view('new.pages.posts', compact('posts'));
    }
}
