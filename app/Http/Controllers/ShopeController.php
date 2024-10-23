<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopeController extends Controller
{
    public function index()
    {
        return view('src.screens.shops.shops');
    }
}
