<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="https://png.pngtree.com/png-vector/20240125/ourmid/pngtree-yellow-sofa-furniture-png-image_11548333.png">

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="src/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet" />

    <title>
        @if (Auth::check())
            {{ Auth::user()->name }}'s Cart
        @else
            {{ config('app.name') }} - Cart
        @endif
    </title>
</head>

<body class="bg-gray-100">
    @include('src.components.header')

    <div class="min-h-screen flex items-center justify-center">
        <div class="container mx-auto my-10 p-8 bg-white shadow-lg rounded-lg">
            <h1 class="text-3xl font-extrabold mb-6 text-gray-800">Your Cart</h1>

            @if($cart && $cart->count() > 0)
                <div class="flex flex-col space-y-4">
                    @php $total = 0; @endphp
                    @foreach($cart as $cartItem)
                        @php 
                            $price = (float) $cartItem->product->prix; 
                            $quantity = (int) $cartItem->quantity;
                            $total += $price * $quantity; 
                        @endphp

                        <div class="flex items-center justify-between p-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm transition hover:shadow-md">
                            <div class="flex items-center">
                                <img src="{{ asset('storage/' . $cartItem->product->images[0]) }}" alt="{{ $cartItem->product->title }}" class="w-[100px] h-auto rounded-lg shadow-md">
                                <div class="ml-4">
                                    <h2 class="text-lg font-semibold text-gray-800">{{ $cartItem->product->title }}</h2>
                                    <p class="text-gray-600">${{ number_format($price, 2) }}</p>
                                    <p class="text-gray-600">Quantity: {{ $quantity }}</p>
                                </div>
                            </div>
                            <div>
                                <form action="{{ route('cart.remove', $cartItem->product_id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                    <div class="flex justify-between text-xl font-semibold border-t border-gray-200 pt-4 mt-4">
                        <p>Total</p>
                        <p>${{ number_format($total, 2) }}</p>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <form action="{{ route('cart.checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-500 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:bg-green-600">
                                Proceed to Checkout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="text-center py-10">
                    <h2 class="text-2xl font-bold text-gray-600">Your cart is empty</h2>
                    <a href="/" class="mt-4 inline-block bg-blue-500 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:bg-blue-600">
                        Continue Shopping
                    </a>
                </div>
            @endif
        </div>
    </div>

    @include('src.components.footer')

    <script src="{{ asset('src/js/dropdown.js') }}"></script>
    <script src="{{ asset('src/js/slider.js') }}"></script>
</body>

</html>
