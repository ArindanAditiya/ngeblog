<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    // protected $table = "blog_posts"; // kalo mau nama tablenya beda sama nama modelnya harus pake ini

    // yang boleh diisi
    protected $fillable = ["title", "author", "slug", "body"];

    // yang nggk boleh diisi
    // protected $guarded = ["id"];

    public function author():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
