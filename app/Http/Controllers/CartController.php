<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Services\Facades\CartFacade;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        CartFacade::addToCart($request, $id);
        return response()->json(['message' => 'Product added to cart successfully']);
    }

    public function showCart()
    {
        $cart = CartFacade::showCart();
        return view('src.screens.carts.show', $cart);
    }

    public function removeFromCart($id)
    {
        CartFacade::removeFromCart($id);
        return redirect()->back();
    }
}
