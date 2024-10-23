<div class="relative container mx-auto bg-white shadow-lg rounded-xl hover:shadow-2xl transition-shadow duration-300 ease-in-out mb-10 overflow-hidden">
    <div id="slider" class="flex transition-transform duration-700 ease-in-out w-full">

        @foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10] as $item)
            <div class="flex flex-col md:flex-row justify-between items-center md:gap-4 gap-8 w-full flex-none">

                <div class="md:w-1/2 w-full p-4 md:p-8">
                    <h1 class="text-black md:text-left text-center font-bold text-3xl md:text-4xl">
                        Woody Product {{ $item }}
                    </h1>
                    <p class="text-gray-600 mt-4 md:mt-6 text-lg leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit ...
                    </p>
                </div>

                <div class="w-full md:w-1/2 p-4 md:p-8 flex justify-center items-center">
                    <img 
                        src="https://picsum.photos/200/150"
                        alt="Product image"
                        class="w-full h-full md:max-h-full object-cover rounded-lg shadow-lg hover:rotate-6 transition-transform duration-300"
                    >
                </div>
            </div>
        @endforeach

    </div>
</div>

