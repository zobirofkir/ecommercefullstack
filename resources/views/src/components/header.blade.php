<nav class="fixed top-0 left-0 right-0 z-50 mb-10">
    <div class="flex justify-between w-full items-center  bg-white px-5 md:px-10 py-5 flex justify-between items-center shadow-lg">

        <div class="flex items-center">
           <a href="{{url('/')}}">
                <h1 class="text-black font-bold text-2xl">
                    @if (Auth::check())
                        {{ Auth::user()->name }}
                    @else
                        {{config('app.name')}}
                    @endif
                </h1>
            </a>
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

        <div class="hidden md:flex gap-6 items-center">
        
            @if (!Auth::check())
                <div>
                    <a href="{{ url('/login') }}" class="flex gap-2 items-center">
                        <h3 class="text-black font-bold text-md">Login</h3>
                        <i class="fa-solid fa-right-to-bracket fa-md"></i>
                    </a>
                </div>
            @endif
    
                @if (!Auth::check())
                <div>
                    <a href="{{ url('/register') }}" class="flex gap-2 items-center">
                        <h3 class="text-black font-bold text-md">Register</h3>
                        <i class="fa-solid fa-user-plus fa-md"></i>
                    </a>
                </div>
            @endif

            @if (Auth::check())
                <div>
                    <a href="{{ url('/profile') }}">
                        <i class="fa-regular fa-user"></i>
                    </a>
                </div>
            @endif

            @if (Auth::check())
                <div class="bg-green-400 px-5 py-1 rounded-full">
                    <a href="{{url('/carts')}}">
                        <i class="fa-solid fa-cart-shopping text-white"></i>
                    </a>
                </div>
            @endif
        </div>
    </div>

    <div id="mobile-menu" class="md:hidden hidden flex-col bg-white shadow-lg rounded-lg p-5 transition-all duration-300 ease-in-out max-h-0 overflow-hidden">
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

            @if (Auth::check())
                <div class="bg-gray-200 p-2 rounded-full shadow-md hover:bg-gray-300 transition-colors duration-200 cursor-pointer">
                    <a href="{{url('/profile')}}">
                        <i class="fa-regular fa-user text-black"></i>
                    </a>
                </div>
            @endif
            
        </div>
    </div>    
</nav>
