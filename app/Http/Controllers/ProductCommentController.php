<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCommentRequest;
use App\Models\Product;
use App\Models\ProductComment;
use App\Services\Facades\ProductCommentFacade;
use Illuminate\Http\Request;

class ProductCommentController extends Controller
{
    public function index($productId)
    {
        $product = Product::findOrFail($productId);
        $comments = ProductCommentFacade::index($productId);
        return view('src.screens.shops.shops-comments')->with(compact('product', 'comments'));
    }

    public function store(ProductCommentRequest $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $comment = ProductCommentFacade::store($request);
        
        return redirect()->back();
    }

    public function delete(ProductComment $comment)
    {
        ProductCommentFacade::delete($comment);
        return redirect()->back();
    }
}
 