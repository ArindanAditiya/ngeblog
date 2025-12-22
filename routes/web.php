<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

use function Laravel\Prompts\search;

// other route
Route::get('/', function () {
    return view('home', ["title" => "Home Page"]);
});
Route::get('/about', function () {
    return view('about', ["title" => "About Page"]);
});
Route::get('/contact', function () {
    return view('contact', ["title" => "Contact Page"]);
});
// __________________________________________________________

//BLOG
Route::get('/posts', function () {
    $posts = Post::latest()->filter(request(["search",  "author", "category"]))->paginate(10)->withQueryString();
    return view('posts', ["title" => "All Blog Posts", "posts" => $posts]);
});
Route::get("/post/{post:slug}", function(Post $post){
    return view("post", ["title" => "Single Post", "post" => $post]);
});

