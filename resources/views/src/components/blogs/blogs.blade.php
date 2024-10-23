<div class="container mx-auto mb-10">
    <div>
        <div>
            <h1 class="text-3xl font-bold mb-6 text-center">Blogs</h1>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ([1, 2, 4, 5, 6, 7, 8, 9 , 10, 11, 12, 2] as $blog)
                <div class="bg-white shadow-lg rounded-lg p-4 transition-transform duration-300 ease-in-out transform hover:scale-105 hover:-rotate-3">
                    <a href="#" class="">
                        <div class="flex justify-center items-center">
                            <img src="https://picsum.photos/200/300" alt="Blog Image" class="w-full md:h-[400px] h-[200px] object-cover object-center rounded">
                        </div>
                        <div class="flex flex-col justify-center items-center">
                            <h1 class="text-xl font-bold text-black hover:-rotate-3 transition-transform duration-300">Blog Title</h1>
                            <p class="text-md font-semibold text-black hover:-rotate-3 transition-transform duration-300">Blog Description</p>
                        </div>
                        <div class="flex justify-start items-center">
                            <a href="#" class="text-green-500 hover:text-green-600 font-semibold hover:-rotate-3 transition-transform duration-300">Read More</a>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>