<?php
namespace App\Services\Services;

use App\Http\Requests\ProductCommentRequest;
use App\Models\ProductComment;
use App\Services\Constructor\ProductCommentConstructor;
use Illuminate\Support\Facades\Auth;

class ProductCommentService implements ProductCommentConstructor
{
    public function index($productId)
    {
        $comments = ProductComment::where('product_id', $productId)->orderBy('created_at', 'desc')->get();
        return [
            "comments" => $comments
        ];
    }

    public function store(ProductCommentRequest $request)
    {
        $commentData = $request->validated();
        $commentData['user_id'] = Auth::id();
        
        $comment = ProductComment::create($commentData);
    
        return [
            "comment" => $comment
        ];
    }

    public function delete(ProductComment $comment)
    {
        if (Auth::id() === $comment->user_id) {
            $comment->delete();
            return true;
        }

        return false;
    }
}