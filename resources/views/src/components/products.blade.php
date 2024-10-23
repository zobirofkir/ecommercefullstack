<div class="container mx-auto p-6 mb-10">
    <h1 class="text-3xl font-bold mb-6 text-center">Products</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ([1, 2, 3, 4, 5, 6] as $item)
            <div class="bg-white shadow-lg rounded-lg p-4 transition-transform duration-300 ease-in-out transform hover:scale-105 hover:-rotate-3">
                <img src="https://pngimg.com/d/dress_shirt_PNG8117.png" class="w-full h-auto object-cover object-center rounded-md hover:rotate-3 transition-transform duration-300" alt="Product Image">
                <h3 class="text-xl font-semibold text-gray-800 mt-4 hover:rotate-3 transition-transform duration-300">Product Title {{ $item }}</h3>
                <p class="text-gray-600 mt-2 leading-relaxed hover:rotate-3 transition-transform duration-300">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod quia suscipit voluptatibus molestiae, 
                    quasi voluptates blanditiis reprehenderit repellat deleniti accusamus tempore vitae error sint voluptas.
                </p>
                <div class="flex justify-between items-center mt-4">
                    <a href="#" class="text-green-500 hover:text-green-600 font-semibold hover:rotate-3 transition-transform duration-300">View Details</a>
                    <a href="#" class="text-green-500 hover:text-green-600 font-semibold hover:rotate-3 transition-transform duration-300">Add to Cart</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
