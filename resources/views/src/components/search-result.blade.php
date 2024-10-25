<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="https://png.pngtree.com/png-vector/20240125/ourmid/pngtree-yellow-sofa-furniture-png-image_11548333.png">

    <!-- Stylesheets -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="src/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet" />

    <title>{{ config('app.name') }}</title>
</head>

<body class="bg-gray-100">
    @include('src.components.header')

    @if(isset($results) && $results->isNotEmpty())
        <div class="container mx-auto p-6 mt-6 mb-10 h-screen mt-20">
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-900">Search Results</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($results as $product)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl">
                        <img src="{{ asset('storage/' . $product->images[0]) }}" class="w-full h-48 object-cover object-center" alt="Product Image">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800 hover:text-green-600 transition duration-200">
                                {{ $product->title }}
                            </h3>
                            <p class="text-gray-600 mt-2 truncate">
                                {{ Str::limit($product->description, 80) }}
                            </p>
                            <div class="flex justify-between items-center mt-4">
                                <a href="{{ route('shops.show', $product->slug) }}" class="text-green-500 hover:text-green-600 font-semibold transition duration-200">View Details</a>
                                <a href="{{ route('shops.show', $product->slug) }}" class="text-green-500 md:text-start text-center hover:text-green-600 font-semibold transition duration-200">{{$product->prix }} MAD</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="container mx-auto flex justify-center items-center h-screen">
            <p class="text-center text-gray-600">No products found.</p>
        </div>
    @endif

    @include('src.components.footer')

    <script src="{{asset('src/js/dropdown.js')}}"></script>
    <script src="{{asset('src/js/slider.js')}}"></script>
</body>

</html>
