<?php

namespace App\Services\Constructor;

use App\Http\Requests\BlogCommentRequest;
use App\Models\BlogComment;

interface BlogCommentConstructor
{
    public function index($blogId);

    public function store(BlogCommentRequest $request);

    public function delete(BlogComment $comment);
}