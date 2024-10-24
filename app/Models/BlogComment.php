<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    protected $fillable = [
        'user_id',
        'blog_id',
        'name',
        'email',
        'message',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
