<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 ">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight  ">
                {{ __('Add New Product') }}
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
                <h3 class="text-base font-bold text-gray-700">Add Product Details</h3>
            </div>

            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="p-6 space-y-5">
                    <div>
                        <label for="product_name" class="block text-sm font-semibold text-gray-700 mb-1.5">Product Name</label>
                        <input required value="{{ old('product_name') }}" type="text" name="product_name" id="product_name" 
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 transition">
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-semibold text-gray-700 mb-1.5">Category</label>
                        <input required value="{{ old('category') }}" type="text" name="category" id="category" 
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 transition">
                    </div>
                    <div>
                        <label for="unit_price" class="block text-sm font-semibold text-gray-700 mb-1.5">Unit price</label>
                        <input required value="{{ old('price') }}" type="text" name="price" id="price" 
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 transition">
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2 border-t border-gray-200 bg-gray-50 px-6 py-4 justify-between">
                    <a href="{{ route('products.index') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg border border-gray-300 bg-green-600 text-sm font-medium text-white hover:bg-green-700 transition shadow-sm">
                        <i data-lucide="arrow-left" class="w-5 h-5"> </i> Back
                    </a>
                    <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2 bg-amber-600 text-white font-semibold text-sm rounded-lg hover:bg-amber-700 transition shadow-sm">
                        <i data-lucide="send" class="w-5 h-5"> </i> Save product
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>