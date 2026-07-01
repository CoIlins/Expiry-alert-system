<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __($stock->product->product_name . ' Stock Details')}}</h2>
    </x-slot>

    <div class="py-4 max-w-xl mx-auto">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">

            <div class="border-t border-gray-100">
                <dl class="divide-y divide-gray-100 text-sm">
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Product Name</dt>
                        <dd class="text-black-600 sm:col-span-2">{{ $stock->product->product_name }}</dd>
                    </div>
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Current Stock Level</dt>
                        <dd class="text-black-600 sm:col-span-2">{{ $stock->current_stock_level }} units</dd>
                    </div>
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Low Stock Threshold</dt>
                        <dd class="text-black-600 sm:col-span-1">{{ $stock->low_stock_threshold }} units</dd>
                    </div>
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">High Stock Threshold</dt>
                        <dd class="text-black-600 sm:col-span-2">{{ $stock->high_stock_threshold }} units</dd>
                    </div>
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Stock Status</dt>
                        <dd class="sm:col-span-2">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-sm font-bold border 
                                {{ $stock->status === 'No Stock' ? 'bg-rose-50 text-rose-700 border-rose-200' : '' }}
                                {{ $stock->status === 'Low Stock' ? 'bg-amber-50 text-amber-700 border-amber-200' : '' }}
                                {{ $stock->status === 'In Stock' ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : '' }}
                                {{ $stock->status === 'Overstocked' ? 'bg-blue-50 text-blue-700 border-blue-200' : '' }}">
                                {{ $stock->status }}
                            </span>
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex items-center gap-2 justify-between">
                <a href="{{ route('stocks.index') }}" class="inline-flex items-center gap-1.5 px-3 py-2 border border-gray-300 bg-blue-500 text-sm font-semibold text-white rounded-lg hover:bg-blue-600 transition shadow-sm">
                    <i data-lucide="circle-arrow-left" class="w-5 h-5"></i> Back
                </a>
                <a href="{{ route('stocks.edit', $stock->id) }}" class="inline-flex items-center gap-1.5 px-3 py-2 bg-amber-500 text-white text-sm font-bold rounded-lg hover:bg-amber-600 transition shadow-sm">
                    <i data-lucide="square-pen" class="w-5 h-5"></i> Edit Threshold details
                </a>
            </div>
        </div>
    </div>
</x-app-layout>