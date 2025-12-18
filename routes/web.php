<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

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
    $posts = Post::all();
    return view('posts', ["title" => "All Blog Posts", "posts" => $posts]);
});
Route::get("/post/{post:slug}", function(Post $post){
    return view("post", ["title" => "Single Post", "post" => $post]);
});

Route::get("/category/{category:slug}", function(Category $category){
    return view("posts", [
        "title" => "Category $category->name", 
        "posts" => $category->posts
    ]);
});

Route::get('/authors/{user:username}', function (User $user) {
    return view('posts', [
        "title" => count($user->posts) . " Article By $user->name", 
        "posts" => $user->posts
    ]);
});
