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
    <title>Order History</title>
</head>
<body class="bg-gray-100">
    @include('src.components.header')

    <div class="flex flex-col justify-center items-center min-h-screen">

        <div class="container mx-auto my-10 p-8 bg-white shadow-lg rounded-lg">
            <h1 class="text-3xl font-extrabold mb-6 text-gray-800">Order History</h1>
    
            @if($orders->isNotEmpty())
                @foreach($orders as $order)
                    <div class="mb-6 border-b pb-6">
                        <h2 class="text-lg font-semibold">Order #{{ $order->id }} - {{ $order->created_at->format('d M Y') }}</h2>
                        <p>Total: MAD {{ number_format($order->total, 2) }}</p>

                        <ul class="mt-4">
                            @foreach($order->orderItems as $item)
                                <li class="flex justify-between">
                                    <div>{{ $item->product->title }}</div>
                                    <div>{{ $item->quantity }} x MAD {{ number_format($item->price, 2) }}</div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            @else
                <p class="text-center text-gray-600">You have no order history.</p>
            @endif
        </div>
    
    </div>

    @include('src.components.footer')

    <script src="{{ asset('src/js/dropdown.js') }}"></script>
    <script src="{{ asset('src/js/slider.js') }}"></script>
</body>
</html>
