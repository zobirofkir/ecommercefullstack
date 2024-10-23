@if (!Auth::check())
    <div class="container mx-auto p-2">
        <div class="flex flex-col md:flex-row justify-between items-center gap-10">
            <div class="flex flex-col gap-10 justify-between items-center w-full bg-purple-950 p-20 rounded-md hover:rotate-3 transition-transform duration-300">
                <h1 class="text-white font-bold text-3xl hover:-rotate-3 transition-transform duration-300">Subscribe</h1>
                <p class="text-white text-lg font-semibold hover:-rotate-3 transition-transform duration-300">Sign up for our newsletter to get 10% off your first order</p>
                <div class="flex flex-col md:flex-row gap-4">
                    <input type="email" class="text-black font-bold hover:-rotate-3 transition-transform duration-300 bg-white px-8 py-3 rounded-full" placeholder="Enter your email address">
                    <button class="text-black font-bold hover:-rotate-3 transition-transform duration-300 bg-white px-8 py-3 rounded-full">Subscribe</button>
                </div>
            </div>
        </div>
    </div>
@endif