<?php
namespace App\Services\Services;

use App\Models\Category;

class CategoryService
{

    public static function get() : array
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return [
            'categories' => $categories
        ];
    }
}