<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\Facades\CategoryFacade;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('src.components.categories.categories');
    }

    public function show()
    {
        return view('src.components.categories.category-show');
    }
}
