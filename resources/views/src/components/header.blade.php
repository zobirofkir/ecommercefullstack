<nav>
    <div class="flex justify-between w-full items-center fixed top-0 left-0 right-0 z-50 bg-white px-5 md:px-10 py-5 flex justify-between items-center shadow-lg">

        <!-- Logo Section -->
        <div class="flex items-center">
            <h1 class="text-black font-bold text-2xl">Woody</h1>
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button id="menu-toggle" class="focus:outline-none">
                <i class="fa-solid fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Desktop Menu -->
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

        <!-- Cart and Profile Icons (Desktop) -->
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

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden flex-col mt-20 bg-white shadow-lg rounded-lg p-5 transition-all duration-300 ease-in-out max-h-0 overflow-hidden">
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

        <!-- Cart and Profile Icons (Mobile) -->
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
