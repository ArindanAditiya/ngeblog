<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post{
    public static function all()
    {
        return [
        // Arindan Aditiya (Web Developer)
        [
            "id" => 1,
            "slug" => "tips-memulai-karir-sebagai-web-dev",
            "title" => "Tips Memulai Karier Sebagai Web Developer",
            "author" => "Arindan Aditiya",
            "date" => "20-11-2025",
            "body" => "Buat kau yang baru mau mulai jadi web developer, hal pertama yang perlu dipahami adalah dasar-dasar seperti HTML, CSS, dan JavaScript. Tiga hal ini jadi fondasi sebelum masuk ke framework modern. Setelah itu, pelajari juga cara kerja internet, hosting, dan sedikit tentang desain biar kode yang kau buat lebih enak dipakai. ."
        ],

        // Ali Hanapiah (Data Analyst)
        [
            "id" => 2,
            "slug" => "pengenalan-data-analis-untuk-mahasiswa-baru",
            "title" => "Pengenalan Data Analyst untuk Mahasiswa Baru",
            "author" => "Ali Hanapiah",
            "date" => "18-11-2025",
            "body" => "Seorang Data Analyst punya tugas utama ngumpulin, ngelola, dan memahami data supaya bisa bantu ngambil keputusan yang tepat. Profesi ini penting karena hampir semua perusahaan sekarang bergantung sama data. Untuk mulai belajar, kau bisa pahami dasar statistik, cara baca grafik, dan belajar tools kayak Excel atau SQL."
        ]
    ];
    }

    public static function find($slug)
    {
        // return Arr::first(static::all(), function($post) use ($slug){ 
        //     return $post["slug"] == $slug;
        // });  

        // arrow php
        return Arr::first(static::all(), fn($post) => $post["slug"] == $slug ?? abort_if(!$post, 404));
    }
}