<nav class="container mx-auto">
    <div class="flex justify-between w-full mt-5 p-5 md:p-0 items-center">

        <div class="flex items-center">
            <h1 class="text-black font-bold text-2xl">Woddy</h1>
        </div>

        <div class="md:hidden">
            <button id="menu-toggle" class="focus:outline-none">
                <i class="fa-solid fa-bars text-2xl"></i>
            </button>
        </div>

        <div id="menu" class="hidden md:flex md:items-center">
            <ul class="flex gap-4 items-center">
                <li class="text-white bg-green-400 font-bold text-xl px-5 py-1 rounded-full">Home</li>
                <li class="text-white bg-green-400 font-bold text-xl px-5 py-1 rounded-full">Blog</li>
                <li class="text-white bg-green-400 font-bold text-xl px-5 py-1 rounded-full">Shop</li>
                <li class="text-white bg-green-400 font-bold text-xl px-5 py-1 rounded-full">Contact</li>
            </ul>
        </div>

        <div class="hidden md:flex gap-4 items-center">
            <div class="bg-green-400 px-5 py-1 rounded-full">
                <i class="fa-solid fa-cart-shopping text-white"></i>
            </div>

            <div>
                <i class="fa-regular fa-user"></i>
            </div>
        </div>
    </div>


    <div id="mobile-menu" class="md:hidden hidden flex-col mt-5 bg-white shadow-lg rounded-lg p-5 transition-all duration-300 max-h-0 overflow-hidden">
        <ul class="flex flex-col gap-4">
            <li class="text-black text-lg font-medium hover:bg-green-400 hover:text-white px-3 py-2 rounded-lg transition-colors duration-200 cursor-pointer">Home</li>
            <li class="text-black text-lg font-medium hover:bg-green-400 hover:text-white px-3 py-2 rounded-lg transition-colors duration-200 cursor-pointer">Blog</li>
            <li class="text-black text-lg font-medium hover:bg-green-400 hover:text-white px-3 py-2 rounded-lg transition-colors duration-200 cursor-pointer">Shop</li>
            <li class="text-black text-lg font-medium hover:bg-green-400 hover:text-white px-3 py-2 rounded-lg transition-colors duration-200 cursor-pointer">Contact</li>
        </ul>

        <div class="flex gap-6 items-center mt-6">
            <div class="bg-green-400 px-5 py-2 rounded-full shadow-md hover:bg-green-500 transition-colors duration-200 cursor-pointer">
                <i class="fa-solid fa-cart-shopping text-white"></i>
            </div>
            <div class="bg-gray-200 p-2 rounded-full shadow-md hover:bg-gray-300 transition-colors duration-200 cursor-pointer">
                <i class="fa-regular fa-user text-black"></i>
            </div>
        </div>
    </div>    
</nav>

