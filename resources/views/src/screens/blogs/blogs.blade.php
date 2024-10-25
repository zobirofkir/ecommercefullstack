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
    
    @include('src.components.search.search')

    @include('src.components.categories.categories')

    
    @foreach ($blogs->take(1) as $blog)

    <div class="container mx-auto bg-gray-100 p-10 rounded-md md:block hidden">
        <div class="flex justify-center">
            <h1 class="text-3xl font-bold mb-10">Last Blog</h1>
        </div>
    
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="w-full md:w-1/2 mb-8 md:mb-0">
                <h1 class="text-3xl font-bold md:px-10 px-0 text-center md:text-left">{{ $blog->title }}</h1>
                <p class="text-md font-semibold mt-5 md:mt-10 md:px-10 px-0 text-center md:text-left">
                    {{Str::limit($blog->description, 150)}}
                </p>
            </div>
    
            <div class="w-full md:w-1/2">
                <img src="{{ asset('storage/' . $blog->image[0]) }}" class="w-full h-full object-cover object-center rounded-md" alt="Default Image">
            </div>
        </div>
    
        <div class="flex justify-center mt-10">
            <a href="{{route('blogs.show', $blog->slug)}}" class="bg-green-400 px-10 py-3 rounded-full font-bold whitespace-nowrap">
                Read More
            </a>
        </div>
    </div>

    @endforeach
    @include('src.components.blogs.blogs')
    
    @include('src.components.lister')
    @include('src.components.navigations.footer')

    <script src="{{asset('src/js/dropdown.js')}}"></script>
    <script src="{{asset('src/js/slider.js')}}"></script>

</body>
</html>