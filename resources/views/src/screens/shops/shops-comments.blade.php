@php
    $items = App\Services\Facades\ProductCommentFacade::index($product->id);
    $comments = $items['comments'];
@endphp

<div class="container mx-auto mt-8 md:p-0 p-6">
    <h2 class="text-xl font-semibold mb-4">Comments ({{ $comments->count() }})</h2>

    @if (Auth::check())
        <form method="POST" action="{{ route('products.comments.store', $product->id) }}" class="mt-6 mb-10">
            @csrf
            <div class="mb-4">
                <input type="text" name="name" class="w-full border border-gray-300 rounded-lg p-2" placeholder="Your Name" required>
            </div>
            <div class="mb-4">
                <input type="email" name="email" class="w-full border border-gray-300 rounded-lg p-2" placeholder="Your Email" required>
            </div>
            <div class="mb-4">
                <textarea name="message" rows="4" class="w-full border border-gray-300 rounded-lg p-2" placeholder="Add your comment here..." required></textarea>
            </div>
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="mt-2 bg-green-500 font-bold text-white py-2 px-4 rounded-lg hover:bg-green-700 duration-300">
                Submit Comment
            </button>
        </form>
    @endif

    @foreach ($comments as $comment)
        <div class="bg-gray-200 rounded-lg p-4 mb-4">
            <div class="flex justify-between items-center">
                <span class="font-semibold text-gray-800">{{ $comment->name }}</span>
                <span class="text-sm text-gray-500">{{ $comment->created_at->format('F j, Y, g:i a') }}</span>
            </div>
            <p class="mt-2 text-gray-700">{{ $comment->message }}</p>

            @if (Auth::check() && Auth::id() === $comment->user_id)
                <form action="{{ route('products.comments.delete', $comment->id) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE') <!-- Use DELETE method for RESTful routes -->
                    <button type="submit" class="text-red-500 hover:text-red-700">
                        Delete
                    </button>
                </form>
            @endif
        </div>
    @endforeach
</div>
