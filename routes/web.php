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
    // _____ PERMASALHAN N + 1 _____
    // DEFAULT (sudah digunakan di model POST)
    
    /* KALAU TELAH DISET TIDAK DEFAULT EAGER LOAD DARI MODELNYA
     * lazy load(default bawan dan buat nyaman ngoding) = malas ngeload (ngelakuin query kalau lagi dibutuhkan saja)
     * $posts = Post::all();

     * eager load = semangat ngeload (ngelakuin  query dari awal)
     * $posts = Post::with(["category", "author"])->latest()->get();
    */
    $posts = Post::latest();

    if(request("search")){
        $posts->where("title", "like", "%". request("search") . "%");
    }

    return view('posts', ["title" => "All Blog Posts", "posts" => $posts->get()]);
});
Route::get("/post/{post:slug}", function(Post $post){
    return view("post", ["title" => "Single Post", "post" => $post]);
});

Route::get("/category/{category:slug}", function(Category $category){
    // _____ PERMASALHAN N + 1 _____
    // DEFAULT (sudah digunakan di model POST)
    /*
        ini digunakan jika tidak diset default dari awal
        $posts = $category->posts->load("category", "author");
    */
    return view("posts", [
        "title" => "Category $category->name", 
        "posts" => $category->posts
    ]);
});

Route::get('/authors/{user:username}', function (User $user) {
    // _____ PERMASALHAN N + 1 _____
    // DEFAULT (sudah digunakan di model POST)
    /*
        ini digunakan jika tidak diset default dari awal
        $posts = $user->posts->load("category", "author");
    */
    return view('posts', [
        "title" => count($user->posts) . " Article By $user->name", 
        "posts" => $user->posts
    ]);
});
