<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="https://png.pngtree.com/png-vector/20240125/ourmid/pngtree-yellow-sofa-furniture-png-image_11548333.png">

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
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
    @include('src.components.navigations.header')
    @include('src.components.search.search')

    @if (Auth::user()->orders->count() > 0)
        <div class="mt-4 flex justify-end container mx-auto md:px-0 px-5">
            <a href="{{route('order.history')}}" class="bg-green-400 px-6 py-3 rounded-lg text-white transition hover:bg-green-500 flex items-center">
                <i class="fa-solid fa-list-check mx-2"></i> ({{ Auth::user()->orders->count() }})
            </a>
        </div>
    @endif

    <div class="min-h-screen flex items-center justify-center md:-mt-24 -mt-20">
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
                                <img src="{{ asset('storage/' . $cartItem->product->images[0]) }}" alt="{{ $cartItem->product->title }}" class="w-24 h-auto rounded-lg shadow-md">
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
                        <p>MAD {{ number_format($total, 2) }}</p>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button onclick="showModal()" class="bg-green-500 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:bg-green-600 transition">
                            Proceed to Checkout
                        </button>
                    </div>
                </div>
            @else
                <div class="text-center py-10">
                    <h2 class="text-2xl font-bold text-gray-600">Your cart is empty</h2>
                    <a href="/" class="mt-4 inline-block bg-blue-500 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:bg-blue-600 transition">
                        Continue Shopping
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal -->
    <div id="checkoutModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-semibold mb-4">Enter Your Details</h2>
            <form action="{{ route('cart.checkout') }}" method="POST" id="checkoutForm">
                @csrf
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700">Phone Number:</label>
                    <input 
                        type="text" 
                        id="phone" 
                        name="phone" 
                        placeholder="Enter your phone number" 
                        value="{{ old('phone', Auth::check() ? optional(App\Models\Order::where('user_id', Auth::id())->latest()->first())->phone : '') }}" 
                        required 
                        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-green-200"
                    >
                </div>
            
                <div class="mb-4">
                    <label for="address" class="block text-gray-700">Address:</label>
                    <textarea 
                        id="address" 
                        name="address" 
                        required 
                        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-green-200" 
                        placeholder="Enter your address">{{ old('address', Auth::check() ? optional(App\Models\Order::where('user_id', Auth::id())->latest()->first())->address : '') }}</textarea>
                </div>
            
                <div class="flex justify-end">
                    <button type="button" onclick="hideModal()" class="bg-red-500 text-white px-4 py-2 rounded-lg mr-2 transition hover:bg-red-600">Cancel</button>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg transition hover:bg-green-600">Confirm</button>
                </div>
            </form>
        </div>
    </div>

    @include('src.components.navigations.footer')

    <script src="{{ asset('src/js/dropdown.js') }}"></script>
    <script src="{{ asset('src/js/slider.js') }}"></script>
    <script>
        function showModal() {
            document.getElementById('checkoutModal').classList.remove('hidden');
        }

        function hideModal() {
            document.getElementById('checkoutModal').classList.add('hidden');
        }
    </script>
</body>

</html>
