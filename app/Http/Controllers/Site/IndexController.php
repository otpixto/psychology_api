<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class IndexController extends Controller
{
    public function index(): Response
    {
        $mainPost = Post::where('is_main', true)->first();

        $otherPosts = Post::where('is_main', false)->limit(3)->get();

        return Inertia::render('Welcome/Welcome', [
            'mainPost' => $mainPost,
            'otherPosts' => $otherPosts,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'currentYear' => date('Y'),
            'meta' => 'Главная - Сайт о психологии Анны Сергеевой',
            'title' => 'Главная - Сайт о психологии Анны Сергеевой',
        ]);
    }
}
