<?php

namespace App\Services\Services;

use App\Models\Blog;
use App\Services\Constructor\BlogConstructor;

class BlogService implements BlogConstructor
{

    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return [
            "blogs" => $blogs
        ];
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return [
            "blog" => $blog
        ];
    }
}