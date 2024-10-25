<?php

namespace App\Http\Controllers;

use App\Services\Facades\SearchFacade;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $results = SearchFacade::search($request->search); 
        return view('src.screens.search.search-result', ['results' => $results]);
    }
}
