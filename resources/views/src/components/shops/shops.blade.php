<div class="container mx-auto p-6 mb-10">
    <h1 class="text-3xl font-bold mb-6 text-center">Our Products</h1>
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 md:gap-6 gap-3">
        @php
            $items = App\Services\Facades\ProductFacade::index();
            $products = $items['products'];
        @endphp
        @foreach ($products as $product)
            <div class="bg-white shadow-lg rounded-lg p-4 transition-transform duration-300 ease-in-out transform hover:scale-105 hover:-rotate-3">
                <img src="{{asset('storage/' . $product->images[0])}}" class="w-full h-auto object-cover object-center rounded-md hover:rotate-3 transition-transform duration-300" alt="Product Image">
                <h3 class="text-xl font-semibold text-gray-800 mt-4 hover:rotate-3 transition-transform duration-300">
                    {{ $product->title }}    
                </h3>
                <p class="hover:rotate-3 transition-transform duration-300 mt-3">
                    {{ $product->description }}
                </p>
                <div class="flex md:flex-row flex-col justify-between items-center mt-4">
                    <a href="{{route('shops.show', $product->slug)}}" class="text-green-500 hover:text-green-600 font-semibold hover:rotate-3 transition-transform duration-300 whitespace-nowrap">View Details</a>
                    <a href="#" class="text-green-500 hover:text-green-600 font-semibold hover:rotate-3 transition-transform duration-300 whitespace-nowrap">Add to Cart</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
