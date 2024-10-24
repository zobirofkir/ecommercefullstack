<?php

namespace App\Services\Services;

use App\Models\Product;
use App\Services\Constructor\SearchConstructor;

class SearchService implements SearchConstructor
{

    public function search($searchTerm = null)
    {
        return Product::where('title', 'like', '%' . $searchTerm . '%')->get();
    }

}