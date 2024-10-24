<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCommentRequest;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Services\Facades\BlogCommentFacade;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    public function index($blogId)
    {
        $blog = Blog::findOrFail($blogId);
        $comments = BlogCommentFacade::index($blogId);
        return view('src.screens.blogs.blogs-comments')->with(compact('blog', 'comments'));
    }

    public function store(BlogCommentRequest $request, $blogId)
    {
        $blog = Blog::findOrFail($blogId);
        $comment = BlogCommentFacade::store($request);
        
        return redirect()->back();
    }

    public function delete(BlogComment $comment)
    {
        BlogCommentFacade::delete($comment);
        return redirect()->back();
    }
}
