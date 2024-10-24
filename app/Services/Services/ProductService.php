<?php

namespace App\Services\Services;

use App\Models\Product;
use App\Services\Constructor\ProductConstructor;

class ProductService implements ProductConstructor
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return [
            "products" => $products
        ];
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return [
            "product" => $product
        ];
    }
}