<?php

namespace App\Services\Constructor;

use App\Http\Requests\ProductCommentRequest;
use App\Models\ProductComment;

interface ProductCommentConstructor
{
    public function index($productId);

    public function store(ProductCommentRequest $request);

    public function delete(ProductComment $comment);

}