<x-app-layout>

    <div class="container mx-auto bg-gray-100 p-10 rounded-md">
        <div class="flex justify-center">
            <h1 class="text-3xl font-bold mb-10">Last Blog</h1>
        </div>
    
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="w-full md:w-1/2 mb-8 md:mb-0">
                <h1 class="text-3xl font-bold md:px-10 px-0 text-center md:text-left">Blog Test Num 1</h1>
                <p class="text-md font-semibold mt-5 md:mt-10 md:px-10 px-0 text-center md:text-left">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur reprehenderit, veritatis saepe maiores unde inventore ad, delectus dolorum minus dolor omnis debitis, id aut! Placeat, quibusdam! Reiciendis rem, alias facilis quia ducimus eveniet? Tempora quis inventore corrupti, voluptates ipsum voluptate quod laboriosam vel, itaque veritatis ratione iure aliquid aliquam illo quam cum ipsa. Adipisci ratione, incidunt illum quis earum delectus, a error minus perferendis deserunt itaque, voluptate sunt sed omnis quod! Excepturi impedit illum, tenetur ipsum nostrum ad reiciendis in veritatis tempora soluta perferendis debitis obcaecati enim dolorum nesciunt tempore? Nobis dolor amet similique accusantium minus placeat debitis perferendis hic.
                </p>
            </div>
    
            <div class="w-full md:w-1/2">
                <img src="https://picsum.photos/950/800" class="w-full h-full object-cover object-center rounded-md" alt="">
            </div>
        </div>
    
        <div class="flex justify-center mt-10">
            <a href="#" class="bg-green-400 px-10 py-3 rounded-full font-bold whitespace-nowrap">
                Read More
            </a>
        </div>
    </div>
    
    @include('src.components.blogs.blogs')
</x-app-layout>