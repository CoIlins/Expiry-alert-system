<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Product') }}
            </h2>

        </div>
    </x-slot>

    <div class="py-4 max-w-2xl mx-auto">
        @if($errors->any())
            <div class="mb-4 p-4 bg-rose-50 border-l-4 border-rose-500 text-rose-800 rounded-r-lg shadow-sm">
                <ul class="list-disc list-inside text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/70">
                <h3 class="text-base font-bold text-gray-700">Edit product details</h3>
            </div>

            <form action="{{ route('products.update', $product->product_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="p-6 space-y-5">
                    <div>
                        <label for="product_name" class="block text-sm font-semibold text-gray-700 mb-1.5">Product Name</label>
                        <input type="text" name="product_name" id="product_name" value="{{ old('product_name', $product->product_name) }}" required 
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 transition">
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-semibold text-gray-700 mb-1.5">Category</label>
                        <input type="text" name="category" id="category" value="{{ old('category', $product->category) }}" required 
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 transition">
                    </div>
                    <div>
                        <label for="price" class="block text-sm font-semibold text-gray-700 mb-1.5">Price</label>
                        <input type="text" name="price" id="price" value="{{ old('price', $product->price) }}" required 
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 transition">
                    </div>
                </div>

                <div class="flex items-center gap-2 justify-between border-t border-gray-200 bg-gray-50 px-6 py-4">
                    <a href="{{ route('products.index') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg border border-gray-300 bg-cyan-500 text-sm font-medium text-white hover:bg-cyan-600 transition shadow-sm">
                        <i data-lucide="arrow-left" class="w-4 h-4"> </i> Back
                    </a>
                    <button type="submit" class="flex items-center gap-2 px-4 py-2 bg-amber-500 text-white font-semibold text-sm rounded-lg hover:bg-amber-600 transition shadow-sm">
                        <i data-lucide="send" class="w-4 h-4"> </i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>