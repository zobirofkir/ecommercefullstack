<div class="container mx-auto p-6 mt-[100px]">
    <div class="flex justify-center items-center">
        <div class="flex gap-4 items-center shadow-lg px-8 py-3 rounded-full hover:shadow-2xl transition-shadow duration-300">

            <div>
                <i class="fa-solid fa-magnifying-glass fa-xl" style="color: #63E6BE;"></i>
            </div>
            
            <form action="{{url('/search')}}" class="flex min-w-[200px] gap-4 items-center">
                <input type="text" name="search" placeholder="Search ..." class="text-black font-bold w-full max-w-xs sm:max-w-md lg:max-w-lg rounded-full px-4 py-2">
                <input type="submit" value="Search" class="text-black font-bold hover:-rotate-3 transition-transform duration-300 bg-white px-8 py-3 rounded-full bg-green-100 cursor-pointer">
            </form>
        </div>
    </div>
</div>
