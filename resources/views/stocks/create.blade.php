<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Stock Thresholds') }}
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
            <form action="{{ route('stocks.store') }}" method="POST">
                @csrf
                <div class="p-6 space-y-5">
                    <div>
                        <label for="product_id" class="block text-sm font-semibold text-gray-700 mb-1.5">Select Product</label>
                        <select required name="product_id" id="product_id" 
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 transition">
                            <option value="" >Choose a product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->product_id }}" {{ old('product_id') == $product->product_id ? 'selected' : '' }}>
                                    {{ $product->product_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="low_stock_threshold" class="block text-sm font-semibold text-gray-700 mb-1.5">Low Stock Threshold</label>
                        <input required value="{{ old('low_stock_threshold', 10) }}" type="number" name="low_stock_threshold" id="low_stock_threshold" placeholder="Alert when stock falls below this number"
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 transition">
                    </div>

                    <div>
                        <label for="high_stock_threshold" class="block text-sm font-semibold text-gray-700 mb-1.5">High Stock Threshold </label>
                        <input required value="{{ old('high_stock_threshold', 100) }}" type="number" name="high_stock_threshold" id="high_stock_threshold" placeholder="Alert when stock exceeds this number"
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 transition">
                    </div>
                </div>

                <div class="flex items-center justify-between border-t border-gray-200 bg-gray-50 px-6 py-4">
                    <a href="{{ route('stocks.index') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg border border-gray-300 bg-green-600 text-sm font-medium text-white hover:bg-green-700 transition shadow-sm">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i> Back
                    </a>
                    <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2 bg-amber-600 text-white font-semibold text-sm rounded-lg hover:bg-amber-700 transition shadow-sm">
                        <i data-lucide="send" class="w-4 h-4"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>