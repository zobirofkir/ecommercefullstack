<div class="container mx-auto p-6 mb-10">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-900">Our Products</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @php
            $items = App\Services\Facades\ProductFacade::index();
            $products = $items['products'];
        @endphp
        @foreach ($products as $product)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl">
                <img src="{{ asset('storage/' . $product->images[0]) }}" class="w-full h-48 object-cover object-center" alt="Product Image">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 hover:text-green-600 transition duration-200">
                        {{ $product->title }}    
                    </h3>
                    <p class="text-gray-600 mt-2 truncate">
                        {{ $product->description }}
                    </p>
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('shops.show', $product->slug) }}" class="bg-green-500 text-white px-4 py-2 rounded-lg text-sm font-semibold transition duration-200 hover:bg-green-600">View Details</a>
                        <a href="#" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm font-semibold transition duration-200 hover:bg-gray-300">Add to Cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
