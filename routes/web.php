<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', \App\Http\Controllers\PostsController::class . '@index');
Route::get('/users', \App\Http\Controllers\UserController::class . '@index');
Route::get('/user/{id}', \App\Http\Controllers\UserController::class . '@view');
