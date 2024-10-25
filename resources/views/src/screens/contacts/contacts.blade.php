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
    @include('src.components.header')
    
    @include('src.components.search')

    @include('src.components.categories')

    <div class="container mx-auto">

        <div class="flex justify-center mt-10">
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Contact Us</h1>
        </div>


        <div class="flex justify-center"> 
            <form action="" class="flex flex-col gap-6 bg-white shadow-lg p-8 rounded-lg w-full max-w-3xl">

                <div class="flex flex-col gap-2">
                    <label for="name" class="text-gray-800 font-semibold text-lg">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your name" 
                           class="shadow-xl px-6 py-4 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-300 transition-all duration-300 ease-in-out">
                </div>


                <div class="flex flex-col gap-2">
                    <label for="email" class="text-gray-800 font-semibold text-lg">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your email" 
                           class="shadow-xl px-6 py-4 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-300 transition-all duration-300 ease-in-out">
                </div>


                <div class="flex flex-col gap-2">
                    <label for="subject" class="text-gray-800 font-semibold text-lg">Subject</label>
                    <input type="text" name="subject" id="subject" placeholder="Your subject" 
                           class="shadow-xl px-6 py-4 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-300 transition-all duration-300 ease-in-out">
                </div>


                <div class="flex flex-col gap-2">
                    <label for="message" class="text-gray-800 font-semibold text-lg">Message</label>
                    <textarea name="message" id="message" placeholder="Your message" rows="5"
                              class="shadow-xl px-6 py-4 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-300 transition-all duration-300 ease-in-out resize-none"></textarea>
                </div>


                <div class="flex justify-center">
                    <input type="submit" value="Send" 
                           class="text-white font-bold bg-green-500 hover:bg-green-600 transition-colors duration-300 px-10 py-4 rounded-full cursor-pointer shadow-lg transform hover:-translate-y-1 hover:shadow-xl">
                </div>
            </form>
        </div>
    </div>

    @include('src.components.lister')
    @include('src.components.footer')

    <script src="{{asset('src/js/dropdown.js')}}"></script>
    <script src="{{asset('src/js/slider.js')}}"></script>
</body>
</html>