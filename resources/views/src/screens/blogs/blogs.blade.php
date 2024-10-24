<x-app-layout>

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
</x-app-layout>