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
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet"/>


    <title>
        @if (Auth::check())
            {{ Auth::user()->name }}
        @else
            {{ config('app.name') }}
        @endif
    </title>
</head>
<body>
    @include('src.components.navigations.header')
    
    @include('src.components.search')

    @include('src.components.categories.categories')


    @php
        $results = App\Services\Facades\CategoryFacade::get();
        $categories = $results['categories'];

        $currentCategorySlug = request()->route('slug');
        $currentCategory = $categories->firstWhere('slug', $currentCategorySlug);

        $selectedCategorySlug = request()->route('slug');
        $selectedCategory = $categories->firstWhere('slug', $selectedCategorySlug);

        if ($selectedCategory) {
            $showCategory = App\Services\Facades\CategoryFacade::show($selectedCategory);
            $categoryItem = $showCategory['categoryItem'];
        } else {
            $categoryItem = [];
        }
    @endphp

    <div class="container mx-auto -mt-10 mb-10 p-6">
        <div class="flex justify-center">
            <h2 class="text-2xl font-bold mb-4">Products in {{ $currentCategory->title }}</h2>
        </div>

        <div class="mt-6 mb-20">
            @include('src.components.slider')
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($categoryItem as $product)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform duration-300 ease-in-out transform hover:scale-105">
                <img src="{{ asset('storage/' . $product->images[0]) }}" class="w-full h-48 object-cover object-center" alt="Product Image">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800 hover:text-green-500 transition duration-200">
                        {{ $product->title }}    
                    </h3>
                    <p class="text-gray-600 mt-2 truncate">
                        {{ $product->description }}
                    </p>
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('products.show', $product->slug) }}" class="text-green-500 md:text-start text-center hover:text-green-600 font-semibold transition duration-200">View Details</a>
                        <a href="{{ route('products.show', $product->slug) }}" class="text-green-500 md:text-start text-center hover:text-green-600 font-semibold transition duration-200">{{$product->prix }} MAD</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>

    @include('src.components.lister')
    @include('src.components.navigations.footer')

    <script src="{{asset('src/js/dropdown.js')}}"></script>
    <script src="{{asset('src/js/slider.js')}}"></script>
</body>
</html>