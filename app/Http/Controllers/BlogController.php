<?php

namespace App\Http\Controllers;

use App\Services\Facades\BlogFacade;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = BlogFacade::index();
        return view('src.screens.blogs.blogs', $blogs);
    }    

    public function show($slug)
    {
        return view('src.screens.blogs.blogs-show');
    }
}
