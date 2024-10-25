<?php

namespace App\Http\Controllers;

use App\Services\Facades\SearchFacade;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        return SearchFacade::search($request->search); 
    }
}
