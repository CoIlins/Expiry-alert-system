<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Stock  Details') }}</h2>
    </x-slot>

    <div class="py-1 max-w-2xl mx-auto">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">

            <div class="border-t border-gray-100">
                <dl class="divide-y divide-gray-100 text-sm">
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Product Name</dt>
                        <dd class="text-black sm:col-span-2">{{ $stocks->product->product_name ?? 'N/A' }}</dd>
                    </div>
                    
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Current Stock Level</dt>
                        <dd class="text-black sm:col-span-2">{{ number_format($stocks->current_stock_level) }} units</dd>
                    </div>

                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Low Threshold</dt>
                        <dd class="text-black sm:col-span-2">{{ number_format($stocks->low_stock_threshold) }} units</dd>
                    </div>

                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">High Threshold</dt>
                        <dd class="text-black sm:col-span-2">{{ number_format($stocks->high_stock_threshold) }} units</dd>
                    </div>



                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Stock Status</dt>
                        <dd class="sm:col-span-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded text-sm font-bold border 
                                {{ $stocks->status === 'No Stock' ? 'bg-rose-50 text-rose-700 border-rose-200' : '' }}
                                {{ $stocks->status === 'Low Stock' ? 'bg-amber-50 text-amber-700 border-amber-200' : '' }}
                                {{ $stocks->status === 'In Stock' ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : '' }}
                                {{ $stocks->status === 'Overstocked' ? 'bg-blue-50 text-blue-700 border-blue-200' : '' }}">
                                {{ $stocks->status }}
                            </span>
                        </dd>
                    </div>

                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Updated At</dt>
                        <dd class="text-black sm:col-span-2 ">
                            {{ $stocks->updated_at ? $stocks->updated_at->format('M d, Y \a\t h:i A') : 'N/A' }}
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex items-center gap-20">
                <a href="{{ route('vendor.stocks.index') }}" class="inline-flex items-center gap-1.5 px-3 py-2 border border-gray-300 bg-indigo-500 text-sm font-semibold text-white rounded-lg hover:bg-indigo-700 transition shadow-sm">
                    <i data-lucide="circle-arrow-left" class="w-5 h-5"></i> Back 
                </a>
                <p class="flex items-center gap-2 text-sm text-gray-600">
                    <span class="flex items-center gap-2 bg-indigo-100 text-indigo-800 px-3 py-1 rounded-lg border border-indigo-200">
                        <i data-lucide="lightbulb" class="w-5 h-5 text-indigo-500 flex-shrink-0"></i>
                        <span class="font-bold">Note:</span>
                        This was created by Clerk {{ $stocks->clerk->first_name }} {{ $stocks->clerk->last_name }}
                    </span>
                </p>

            </div>
        </div>
    </div>
</x-app-layout>