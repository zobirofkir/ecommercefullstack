<?php

namespace App\Http\Controllers;

use App\Services\Facades\ProductFacade;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('src.screens.shops.shops');
    }

    public function show($slug)
    {
        return view('src.screens.shops.shops-show');
    }
}
