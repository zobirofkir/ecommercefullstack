<div class="container mx-auto my-10">
    <div>
        <div class="flex gap-4 items-center mb-10 overflow-x-auto scrollbar-hide md:px-0 px-5">

            @php
                $results = App\Services\Facades\CategoryFacade::get();
                $categories = $results['categories'];
            @endphp

            @foreach ($categories as $category)
                <a href="#">
                    <h1 class="bg-green-100 px-10 py-3 rounded-full font-bold whitespace-nowrap mb-0">{{$category->title}}</h1>
                </a>
            @endforeach

        </div>
    </div>
</div>
