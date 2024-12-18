<div class="container mx-auto my-10">
    <div>
        <div class="flex gap-4 items-center mb-10 overflow-x-auto scrollbar-hide md:px-0 px-5">

            @php
                $results = App\Services\Facades\CategoryFacade::get();
                $categories = $results['categories'];
            
                if (!empty($categories) && isset($categories[0])) {
                    $categoryItem = $categories[0];
                    $showCategory = App\Services\Facades\CategoryFacade::show($categoryItem);
                    $category = $showCategory['categoryItem'];
                } else {

                    $category = null; 
                }
            @endphp
        
            @foreach ($categories as $category)
                <a href="{{route('category.show', $category->slug)}}">
                    @if($category->id === $category->id)
                        <h1 class="bg-green-100 px-10 py-3 rounded-full font-bold whitespace-nowrap mb-10">{{$category->title}}</h1> 
                    @endif
                </a>
            @endforeach

        </div>
    </div>
</div>
