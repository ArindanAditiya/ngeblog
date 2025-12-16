<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

Route::get('/', function () {
    return view('home', ["title" => "Home Page"]);
});

// all posts
Route::get('/posts', function () {
    $posts = Post::all();
    return view('posts', ["title" => "All Blog Posts", "posts" => $posts]);
});

Route::get('/posts/category/{posts:category_slug}', function (Post $posts) {
    return view('posts', [
        'title' => 'Category ' . $posts->category,
        'posts' => Post::where('category_slug', $posts->category_slug)->get(),
    ]);
});

// author articels
Route::get('/authors/{user}', function (User $user) {
    return view('posts', [
        "title" => "Article By $user->name", 
        "posts" => $user->posts
    ]);
});
Route::get("/post/{post:slug}", function(Post $post){
    return view("post", ["title" => "Single Post", "post" => $post]);
});
Route::get('/about', function () {
    return view('about', ["title" => "About Page"]);
});
Route::get('/contact', function () {
    return view('contact', ["title" => "Contact Page"]);
});