<?php
namespace App\Services\Services;

use App\Http\Requests\OrderInfoRequest;
use App\Mail\CheckoutMail;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\Constructor\CartConstructor;
use App\Services\Facades\CartFacade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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


    public function checkout(OrderInfoRequest $request)
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();
    
        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'Your cart is empty.'], 400);
        }
    
        $request->validated();
        
        $order = Order::create([
            'user_id' => $userId,
            'total' => $this->calculateTotal($cartItems),
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
    
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->prix,
            ]);
        }
    
        Mail::to('zobirofkir19@gmail.com')->send(new CheckoutMail($cartItems, $this->calculateTotal($cartItems), $request->phone, $request->address));
    
        Cart::where('user_id', $userId)->delete();
    
        return true;
    }
    
    public function orderHistory()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->with('orderItems.product')->get();
        
        return [
            'orders' => $orders
        ];
    }

    private function calculateTotal($cartItems)
    {
        $total = $cartItems->sum(function ($cartItem) {
            $price = (float) $cartItem->product->prix;
            $quantity = (int) $cartItem->quantity;
            return $price * $quantity;
        });
    
        return $total;
    }


}