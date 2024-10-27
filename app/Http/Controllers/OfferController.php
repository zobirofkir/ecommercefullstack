<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::all();
        return view('src.screens.offers.offers', [
            'offers' => $offers
        ]);
    }


    public function show($slug)
    {
        $offer = Offer::where('slug', $slug)->first();
        return view('src.screens.offers.offers-show', [
            'offer' => $offer
        ]);
    }
}
