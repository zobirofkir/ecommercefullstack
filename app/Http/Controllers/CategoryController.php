<?php

namespace App\Http\Controllers;

use App\Services\Facades\CategoryFacade;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryFacade::get();
        return view('src.components.categories', $categories);
    }
}
