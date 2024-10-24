<x-app-layout>

    @php
        $results = App\Services\Facades\CategoryFacade::get();
        $categories = $results['categories'];

        $currentCategorySlug = request()->route('slug');
        $currentCategory = $categories->firstWhere('slug', $currentCategorySlug);

        $selectedCategorySlug = request()->route('slug');
        $selectedCategory = $categories->firstWhere('slug', $selectedCategorySlug);

        if ($selectedCategory) {
            $showCategory = App\Services\Facades\CategoryFacade::show($selectedCategory);
            $categoryItem = $showCategory['categoryItem'];
        } else {
            $categoryItem = [];
        }
    @endphp

    <div class="container mx-auto mt-10 mb-10 p-6">
        <div class="flex justify-center">
            <h2 class="text-2xl font-bold mb-4">Products in {{ $currentCategory->title }}:</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($categoryItem as $product)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform duration-300 ease-in-out transform hover:scale-105">
                <img src="{{ asset('storage/' . $product->images[0]) }}" class="w-full h-48 object-cover object-center" alt="Product Image">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800 hover:text-green-500 transition duration-200">
                        {{ $product->title }}    
                    </h3>
                    <p class="text-gray-600 mt-2 truncate">
                        {{ $product->description }}
                    </p>
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('shops.show', $product->slug) }}" class="text-green-500 md:text-start text-center hover:text-green-600 font-semibold transition duration-200">View Details</a>
                        <a href="#" class="text-green-500 hover:text-green-600 font-semibold md:text-start text-center transition duration-200">Add to Cart</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>

</x-app-layout>
