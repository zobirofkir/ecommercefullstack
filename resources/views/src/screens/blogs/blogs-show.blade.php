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

            <!-- Comments Section -->
            <div class="container mx-auto mt-8">
                <h2 class="text-xl font-semibold mb-4">Comments (3)</h2>

                <form method="POST" action="/comments/store" class="mt-6 mb-10">
                    <div class="mb-4">
                        <input type="text" name="name" class="w-full border border-gray-300 rounded-lg p-2" placeholder="Your Name" required>
                    </div>
                    <div class="mb-4">
                        <input type="email" name="email" class="w-full border border-gray-300 rounded-lg p-2" placeholder="Your Email" required>
                    </div>
                    <div class="mb-4">
                        <textarea name="content" rows="4" class="w-full border border-gray-300 rounded-lg p-2" placeholder="Add your comment here..." required></textarea>
                    </div>
                    <button type="submit" class="mt-2 bg-green-500 font-bold text-white py-2 px-4 rounded-lg hover:bg-green-700 duration-300">
                        Submit Comment
                    </button>
                </form>

                <!-- Example Comments -->
                <div class="bg-gray-200 rounded-lg p-4 mb-4">
                    <div class="flex justify-between items-center">
                        <span class="font-semibold text-gray-800">John Doe</span>
                        <span class="text-sm text-gray-500">24/10/2024 12:45</span>
                    </div>
                    <p class="mt-2 text-gray-700">This is an example comment.</p>
                </div>

                <div class="bg-gray-200 rounded-lg p-4 mb-4">
                    <div class="flex justify-between items-center">
                        <span class="font-semibold text-gray-800">Jane Smith</span>
                        <span class="text-sm text-gray-500">24/10/2024 11:30</span>
                    </div>
                    <p class="mt-2 text-gray-700">Great blog post, very informative!</p>
                </div>
            </div>
        </div>
    </div>
    @include('src.components.footer')

    <script src="{{asset('src/js/dropdown.js')}}"></script>
    <script src="{{asset('src/js/slider.js')}}"></script>
</body>

</html>
