<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    // protected $table = "blog_posts"; // kalo mau nama tablenya beda sama nama modelnya harus pake ini
 
    /*  kalau semisalnya project laravel hrus 
        menjalankan eager load  dari awal maka harus diset di "App\Providers\AppServiceProvider"
        tambahkan "Model::preventLazyLoad()" di method boot()
        kalau tidak menjalankan eagerload dari awal maka akan error 
        "Attempted to lazy load [author] on model [App\Models\Post] but lazy loading is disabled"
    */

    // set defualat agar menjalankan eager load dari awal 
    protected $with = ["author", "category"];

    // field yang boleh diisi pake factory
    protected $fillable = ["title", "author", "slug", "body"];

    // field yang nggk boleh diisi pake factory
    // protected $guarded = ["id"];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo 
    {
        return $this->belongsTo(Category::class);
    }
}
