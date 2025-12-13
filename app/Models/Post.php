<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $table = "blog_posts"; // kalo mau nama tablenya beda sama nama modelnya harus pake ini

    // yang boleh diisi
    protected $fillable = ["title", "author", "slug", "body"];

    // yang nggk boleh diisi
    // protected $guarded = ["id"];
}
