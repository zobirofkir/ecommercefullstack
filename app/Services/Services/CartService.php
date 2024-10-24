<?php
namespace App\Services\Services;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Services\Constructor\CartConstructor;
use Illuminate\Support\Facades\Auth;


class CartService implements CartConstructor
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $quantity = $request->input('quantity', 1);


        $userId = Auth::id();


        $cartItem = Cart::where('user_id', $userId)->where('product_id', $id)->first();

        if ($cartItem) {

            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {

            Cart::create([
                'user_id' => $userId,
                'product_id' => $id,
                'quantity' => $quantity,
            ]);
        }

        return true;
    }

    public function showCart()
    {
        $cart = Cart::where('user_id', Auth::id())->with('product')->get();

        return [
            'cart' => $cart
        ];
    }

    public function removeFromCart($id)
    {
        $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $id)->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back();
        }

        return true;
    }


}