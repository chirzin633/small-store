<x-app-layout>
    <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
        @if (session()->has('success'))
            <x-alert-success :message="@session('success')" />
        @endif

        <div class="flex items-center justify-between mt-4">
            <h2 class="text-xl font-semibold">List Product</h2>
            <a href="{{ route('products.create') }}">
                <button class="px-10 py-2 font-semibold text-white rounded-md bg-sky-600">Add</button>
            </a>
        </div>

        <div class="grid grid-cols-1 gap-6 mt-5 md:grid-cols-3">
            @foreach ($products as $product)
                <div>
                    <img src="{{ url('storage/' . $product->image ) }}" alt="{{ $product->image }}" />
                    <div class="my-2">
                        <p class="font-light">{{ $product->name }}</p>
                        <p class="font-semibold text-gray-500">Rp.{{ number_format($product->price) }}</p>
                    </div>
                    <button class="w-full px-10 py-2 font-semibold bg-yellow-300 rounded-md">Edit</button>
                </div>
            @endforeach
        </div>

        <div class="mt-5">{{ $products->links() }}</div>
    </div>
</x-app-layout>
