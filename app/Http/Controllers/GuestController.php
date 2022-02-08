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
        $data = [
            'posts' => $posts = Post::orderBy('publish_date', 'DESC') -> get(),
            'categories' => $categories = Category::all(),
        ];
        return view('new.pages.posts', compact('data'));
    }
}
