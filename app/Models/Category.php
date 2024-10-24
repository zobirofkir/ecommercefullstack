<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;


class Category extends Model
{
    protected $fillable = [
        "title", 
        "slug",
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            $blog->slug = Str::slug($blog->title);
        });

        static::updating(function ($blog) {
            if ($blog->isDirty('title')) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }

}
