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
<body class="bg-gray-50 text-gray-800">
    @include('src.components.navigations.header')
    @include('src.components.search.search')
    @include('src.components.categories.categories')

    @php
        $items = App\Services\Facades\CategoryFacade::get();
        $categories = $items['categories'];
    @endphp

    <div class="container mx-auto p-5">
        @foreach ($categories as $category)
            <div class="mb-10 flex items-center justify-between p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div>
                    <h1 class="text-2xl font-semibold text-green-600 mb-2">{{$category->title}}</h1>
                </div>
                <a href="{{route('category.show', $category->slug)}}" class="bg-green-500 text-white px-6 py-2 rounded-full font-semibold hover:bg-green-600 transition duration-200">
                    Show All
                </a>
            </div>
        @endforeach
    </div>    

    @include('src.components.lister')
    @include('src.components.navigations.footer')

    <script src="{{asset('src/js/dropdown.js')}}"></script>
    <script src="{{asset('src/js/slider.js')}}"></script>
</body>
</html>
