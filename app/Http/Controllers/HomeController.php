<?php

namespace App\Http\Controllers;

use App\Services\Facades\CategoryFacade;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
