<?php

namespace App\Services\Services;

use App\Models\Blog;
use App\Models\Product;
use App\Services\Constructor\SearchConstructor;

class SearchService implements SearchConstructor
{

    public function search($searchTerm = null)
    {
        $products = Product::where('title', 'like', '%' . $searchTerm . '%')->get();
        $blogs = Blog::where('title', 'like', '%' . $searchTerm . '%')->get();

        return view('src.screens.search.search-result', [
            'products' => $products, 
            'blogs' => $blogs
        ]);
    }


}