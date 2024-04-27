<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $mainPost = Post::where('is_main', true)->first();

        $otherPosts = Post::where('is_main', false)->limit(3)->get();

        return view('welcome', compact('mainPost', 'otherPosts'));
    }
}
