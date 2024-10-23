<nav class="container mx-auto mb-10">
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
                <a href="{{url('/')}}">
                    <li class="text-black font-bold text-md px-5 py-1 rounded-full">Home</li>
                </a>

                <a href="{{url('/blogs')}}">
                    <li class="text-black font-bold text-md px-5 py-1 rounded-full">Blog</li>
                </a>
                
                <a href="{{url('/shops')}}">
                    <li class="text-black font-bold text-md px-5 py-1 rounded-full">Shop</li>
                </a>
                
                <a href="{{url('/contacts')}}">
                    <li class="text-black font-bold text-md px-5 py-1 rounded-full">Contact</li>                
                </a>
            </ul>
        </div>

        <div class="hidden md:flex gap-4 items-center">
            <div class="bg-green-400 px-5 py-1 rounded-full">
                <a href="{{url('/carts')}}">
                    <i class="fa-solid fa-cart-shopping text-white"></i>
                </a>
            </div>

            <div>
                <a href="{{url('/profile')}}">
                    <i class="fa-regular fa-user"></i>
                </a>
            </div>
        </div>
    </div>


    <div id="mobile-menu" class="md:hidden hidden flex-col mt-5 bg-white shadow-lg rounded-lg p-5 transition-all duration-300 max-h-0 overflow-hidden">
        <ul class="flex flex-col gap-4">
            <a href="{{url('/')}}">
                <li class="text-black text-lg font-medium hover:bg-green-400 hover:text-white px-3 py-2 rounded-lg transition-colors duration-200 cursor-pointer">Home</li>
            </a>

            <a href="{{url('/blogs')}}">
                <li class="text-black text-lg font-medium hover:bg-green-400 hover:text-white px-3 py-2 rounded-lg transition-colors duration-200 cursor-pointer">Blog</li>
            </a>

            <a href="{{url('/shops')}}">
                <li class="text-black text-lg font-medium hover:bg-green-400 hover:text-white px-3 py-2 rounded-lg transition-colors duration-200 cursor-pointer">Shop</li>
            </a>

            <a href="{{url('/contacts')}}">
                <li class="text-black text-lg font-medium hover:bg-green-400 hover:text-white px-3 py-2 rounded-lg transition-colors duration-200 cursor-pointer">Contact</li>
            </a>
            
        </ul>

        <div class="flex gap-6 items-center mt-6">
            <div class="bg-green-400 px-5 py-2 rounded-full shadow-md hover:bg-green-500 transition-colors duration-200 cursor-pointer">
                <a href="{{url('/carts')}}">
                    <i class="fa-solid fa-cart-shopping text-white"></i>
                </a>
            </div>
            <div class="bg-gray-200 p-2 rounded-full shadow-md hover:bg-gray-300 transition-colors duration-200 cursor-pointer">
                <a href="{{url('/profile')}}">
                    <i class="fa-regular fa-user text-black"></i>
                </a>
            </div>
        </div>
    </div>    
</nav>

