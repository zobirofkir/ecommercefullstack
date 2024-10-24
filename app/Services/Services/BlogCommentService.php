<?php

namespace App\Services\Services;

use App\Http\Requests\BlogCommentRequest;
use App\Models\BlogComment;
use App\Services\Constructor\BlogCommentConstructor;
use Illuminate\Support\Facades\Auth;

class BlogCommentService implements BlogCommentConstructor
{
    public function index($blogId) 
    {
        $comments = BlogComment::where('blog_id', $blogId)->orderBy('created_at', 'desc')->get();
        return [
            "comments" => $comments
        ];
    }

    public function store(BlogCommentRequest $request)
    {
        $commentData = $request->validated();
        $commentData['user_id'] = Auth::id();
        
        $comment = BlogComment::create($commentData);
    
        return [
            "comment" => $comment
        ];
    }
    
    public function delete(BlogComment $comment)
    {
        $comment->delete();
        return [
            "comment" => $comment 
        ];
    }
}
