<?php

namespace App\Services\Constructor;

use App\Http\Requests\OrderInfoRequest;
use Illuminate\Http\Request;

interface CartConstructor
{
    public function addToCart(Request $request, $id);

    public function showCart();

    public function removeFromCart($id);

    public function checkout(OrderInfoRequest $request);

    public function orderHistory();
}