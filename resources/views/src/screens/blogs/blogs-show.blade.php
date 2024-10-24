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

    @php
        $slug = request('slug');
        $item = App\Services\Facades\BlogFacade::show($slug);
        $blog = $item["blog"];
    @endphp

    <!-- Blog Content -->
    <div class="container mx-auto px-5">
        <div class="flex flex-col justify-center items-center min-h-screen mt-[150px]">
            <div class="container mx-auto bg-white p-8 md:p-10 rounded-lg shadow-md">
                <div class="flex flex-col justify-center gap-10">

                    <div class="flex justify-center">
                        <div class="w-full lg:w-1/2 flex justify-center items-center overflow-x-auto ">
                            <div class="flex space-x-4">
                                @foreach ($blog->image as $image)
                                    <img src="{{asset('storage/' . $image)}}" alt="Blog Image" class="w-[400px] h-auto rounded-lg shadow-md flex-shrink-0">
                                @endforeach
                            </div>
                        </div>    
                    </div>

                    <div class="flex flex-col gap-4">
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-800">{{ $blog->title }}</h1>
                        <p class="text-md font-semibold text-gray-700">{{ $blog->description }}</p>
                    </div>
                </div>
            </div>

            @include('src.screens.blogs.blogs-comments')
        </div>
    </div>
    @include('src.components.footer')

    <script src="{{asset('src/js/dropdown.js')}}"></script>
    <script src="{{asset('src/js/slider.js')}}"></script>
</body>

</html>
