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
    @include('src.components.navigations.header')

    <div class="flex flex-col justify-center items-center min-h-screen mt-[50px]">

        <div class="container mx-auto my-10 p-8 bg-white shadow-lg rounded-lg">
            <h1 class="text-3xl font-extrabold mb-6 text-gray-800">Order History</h1>
    
            @if($orders->isNotEmpty())
                @foreach($orders as $order)
                    <div class="mb-6 border-b pb-6">
                        <div class="flex justify-center items-center">
                            <p class="text-black font-bold">Total: MAD {{ number_format($order->total, 2) }}</p>
                        </div>

                        <div class="mt-4">
                            @foreach($order->orderItems as $item)
                            <div>
                                <img src="{{ asset('storage/' . $item->product->images[0]) }}" class="w-24 h-24 object-cover object-center" alt="">
                            </div>
                                <div class="flex justify-between items-center ">
                                    <div class="flex justify-center items-center mx-[25px]">
                                        <h1 class="text-black text-lg font-bold">{{ $item->product->title }}</h1>
                                    </div>
                                    <div>{{ $item->quantity }} x MAD {{ number_format($item->price, 2) }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-gray-600">You have no order history.</p>
            @endif
        </div>
    
    </div>

    @include('src.components.navigations.footer')

    <script src="{{ asset('src/js/dropdown.js') }}"></script>
    <script src="{{ asset('src/js/slider.js') }}"></script>
</body>
</html>
