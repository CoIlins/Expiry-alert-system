<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('View Product Details') }}
            </h2>
        </div>
    </x-slot>

    <div class=" max-w-2xl mx-auto">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="border-t border-gray-100">
                <dl class="divide-y divide-gray-100 text-sm">
                    
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-100  transition">
                        <dt class="font-bold text-black-500">Product Name</dt>
                        <dd class="mt-1  sm:col-span-2 sm:mt-0 text-black-600">{{ $product->product_name }}</dd>
                    </div>
                    
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-100  transition">
                        <dt class="font-bold text-black-500">Category</dt>
                        <dd class="mt-1  sm:col-span-2 sm:mt-0 text-black-600">
                            {{ $product->category }}
                        </dd>
                    </div>

                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-100  transition">
                        <dt class="font-bold text-black-500">Unit Price</dt>
                        <dd class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0 ">Ksh. {{ number_format($product->price, 2) }}</dd>
                    </div>

                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-100 transition">
                        <dt class="font-bold text-black-500">Registered By</dt>
                        <dd class="mt-1 sm:col-span-2 sm:mt-0">
                            <span class="inline-flex items-center px-2 py-0.5  text-sm  text-black">
                                {{ $product->clerk->user_id === auth()->id() ? '' :$product->clerk->first_name . ' ' . $product->clerk->last_name }}
                            </span>
                        </dd>
                    </div>
                    
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-100 transition">
                        <dt class="font-bold text-black-500">Created At</dt>
                        <dd class="mt-1  sm:col-span-2 sm:mt-0 whitespace-nowrap">
                            {{ $product->created_at ? $product->created_at->format('M d, Y \a\t H:i A') : 'N/A' }}
                        </dd>
                    </div>
                    
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-100 transition">
                        <dt class="font-bold text-black-500">Updated At</dt>
                        <dd class="mt-1  sm:col-span-2 sm:mt-0 whitespace-nowrap">
                            {{ $product->updated_at ? $product->updated_at->format('M d, Y \a\t H:i A') : 'N/A' }}
                        </dd>
                    </div>
                </dl>
            </div>

            <div class=" px-6 py-4 border-t border-gray-100 flex items-center gap-20">
                <a href="{{ route('vendor.products.index') }}" class="inline-flex items-center gap-1.5 px-3 py-2 border border-gray-300 bg-indigo-500 text-sm font-semibold text-white rounded-lg hover:bg-indigo-700 transition shadow-sm">
                    <i data-lucide="circle-arrow-left" class="w-5 h-5"></i> Back 
                </a>
                <p class="flex items-center gap-2 text-sm text-gray-600">

                    <span class="flex items-center gap-2 bg-indigo-100 text-indigo-800 px-3 py-1 rounded-lg border border-indigo-200">
                        <i data-lucide="lightbulb" class="w-5 h-5 text-indigo-500 flex-shrink-0"></i>
                        <span class="font-bold">Note:</span>
                        This was created by Clerk {{ $product->clerk->first_name }} {{ $product->clerk->last_name }}
                    </span>
                </p>
            </div>
            
        </div>
    </div>
</x-app-layout>