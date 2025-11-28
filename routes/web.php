<?php

use Illuminate\Support\Facades\Route;
use Pest\Support\Arr;
use Termwind\Components\Dd;

Route::get('/', function () {
    return view('home', ["title" => "Home Page"]);
});
Route::get('/posts', function () {
    $posts = [
        // Arindan Aditiya (Web Developer)
        [
            "id" => 1,
            "title" => "Tips Memulai Karier Sebagai Web Developer",
            "author" => "Arindan Aditiya",
            "date" => "20-11-2025",
            "body" => "Buat kau yang baru mau mulai jadi web developer, hal pertama yang perlu dipahami adalah dasar-dasar seperti HTML, CSS, dan JavaScript. Tiga hal ini jadi fondasi sebelum masuk ke framework modern. Setelah itu, pelajari juga cara kerja internet, hosting, dan sedikit tentang desain biar kode yang kau buat lebih enak dipakai. ."
        ],

        // Ali Hanapiah (Data Analyst)
        [
            "id" => 2,
            "title" => "Pengenalan Data Analyst untuk Mahasiswa Baru",
            "author" => "Ali Hanapiah",
            "date" => "18-11-2025",
            "body" => "Seorang Data Analyst punya tugas utama ngumpulin, ngelola, dan memahami data supaya bisa bantu ngambil keputusan yang tepat. Profesi ini penting karena hampir semua perusahaan sekarang bergantung sama data. Untuk mulai belajar, kau bisa pahami dasar statistik, cara baca grafik, dan belajar tools kayak Excel atau SQL."
        ]
    ];


    return view('posts', ["title" => "Blog Page", "posts" => $posts]);
});
Route::get('/about', function () {
    return view('about', ["title" => "About Page"]);
});
Route::get('/contact', function () {
    return view('contact', ["title" => "Contact Page"]);
});