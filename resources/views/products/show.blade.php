
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Product Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-4 max-w-2xl mx-auto">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            {{-- <div class="flex items-center justify-between border-b border-gray-200 bg-gray-50/70 px-6 py-4">
                <h3 class="text-base font-bold text-gray-700">Product Technical Ledger Information</h3>
            </div> --}}

            <div class="border-t border-gray-100">
                <dl class="divide-y divide-gray-100 text-sm">
                    {{-- <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-gray-500">System Product ID</dt>
                        <dd class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0 font-mono font-semibold">#{{ $product->product_id }}</dd>
                    </div> --}}
                    
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Product Name</dt>
                        <dd class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0 text-black-600">{{ $product->product_name }}</dd>
                    </div>
                    
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-200 bg-gray-200 transition">
                        <dt class="font-bold text-black-500">Category</dt>
                        <dd class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0">
                            <span class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0 text-black-600">
                                {{ $product->category }}
                            </span>
                        </dd>
                    </div>

                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Unit price</dt>
                        <dd class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0 ">{{ number_format($product->price, 2) }}</dd>
                    </div>
                    

                    
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-200 bg-gray-200  transition">
                        <dt class="font-bold text-black-500">Created at</dt>
                        <dd class="mt-1 text-gray-600 sm:col-span-2 sm:mt-0 whitespace-nowrap">
                            {{ $product->created_at ? $product->created_at->format('M d, Y \a\t H:i A') : 'N/A' }}
                        </dd>
                    </div>
                    
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Updated at</dt>
                        <dd class="mt-1 text-gray-600 sm:col-span-2 sm:mt-0 whitespace-nowrap">
                            {{ $product->updated_at ? $product->updated_at->format('M d, Y \a\t H:i A') : 'N/A' }}
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="bg-indigo-50 px-6 py-4 border-t border-gray-100 flex items-center gap-2 justify-between">
                <a href="{{ route('products.index') }}" class="inline-flex items-center gap-1.5 px-3 py-2 border border-gray-300 bg-white text-sm font-semibold text-gray-700 rounded-lg hover:bg-gray-50 transition shadow-sm">
                    <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Back to dashboard
                </a>
                <a href="{{ route('products.edit', $product->product_id) }}" class="inline-flex items-center gap-1.5 px-3 py-2 bg-amber-500 text-white text-sm font-bold rounded-lg hover:bg-amber-600 transition shadow-sm justify-end">
                    <i data-lucide="eraser" class="w-3.5 h-3.5"></i> Edit Product
                </a>
            </div>
            
        </div>
    </div>
</x-app-layout>