<div class="container mx-auto mb-10">
    <div>
        <div class="flex justify-center mt-10">
            <h1 class="text-3xl font-bold mb-6 text-center">Our Blogs</h1>
        </div>
        @php
            $items = App\Services\Facades\BlogFacade::index();
            $blogs = $items['blogs'];
        @endphp
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-6 md:px-0 px-5">
            @foreach ($blogs as $blog)
                <div class="bg-white shadow-lg rounded-lg p-4 transition-transform duration-300 ease-in-out transform hover:scale-105 hover:-rotate-3">
                    <a href="{{route('blogs.show', $blog->slug)}}" class="">
                        <div class="flex justify-center items-center">
                            <img src="{{ asset('storage/' . $blog->image[0]) }}" alt="Blog Image" class="w-full md:h-[400px] h-[200px] object-cover object-center rounded hover:rotate-3 transition-transform duration-300">
                        </div>
                        <div class="flex flex-col">
                            <h1 class="text-xl font-bold text-center mt-4 text-black hover:rotate-3 transition-transform duration-300">{{ $blog->title }}</h1>
                            <p class="text-black hover:rotate-3 font-semibold py-2 transition-transform duration-300">{{Str::limit($blog->description, 20)}}</p>
                        </div>
                        <div class="flex justify-start items-center">
                            <a href="{{route('blogs.show', $blog->slug)}}" class="text-green-500 hover:text-green-600 font-semibold hover:rotate-3 transition-transform duration-300">Read More</a>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>