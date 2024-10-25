<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
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

    public function checkout()
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'Your cart is empty.'], 400);
        }

        // Calculate the total
        $total = $cartItems->sum(function ($cartItem) {
            $price = (float) $cartItem->product->prix;
            $quantity = (int) $cartItem->quantity;
            return $price * $quantity;
        });

        $order = Order::create([
            'user_id' => $userId,
            'total' => $total,
        ]);

        // Create order items
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->prix,
            ]);
        }

        Cart::where('user_id', $userId)->delete();

        return redirect()->back();
    }

    public function orderHistory()
    {
        $orders = Order::where('user_id', Auth::id())->with('orderItems.product')->get();
        return view('src.screens.orders.history', compact('orders'));
    }

}
