<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Batch Details') }}</h2>
    </x-slot>

    <div class=" max-w-2xl mx-auto">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="border-t border-gray-100">
                <dl class="divide-y divide-gray-100 text-sm">
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Product Name</dt>
                        <dd class="text-black-600 sm:col-span-2">{{ $batch->product->product_name ?? 'N/A' }}</dd>
                    </div>
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-sm text-black-500">Quantity</dt>
                        <dd class="text-black-600 sm:col-span-2 ">{{ number_format($batch->quantity) }} units</dd>
                    </div>
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Total Price</dt>
                        <dd class="text-black-600 sm:col-span-2 ">Ksh. {{ number_format($batch->total_price, 2) }}</dd>
                    </div>
                    
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Manufacture date</dt>
                        <dd class="text-black-600 sm:col-span-2 ">
                            {{ $batch->manufacture_date ? $batch->manufacture_date->format('M d, Y') : 'N/A' }}
                        </dd>
                    </div>
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Expiry date</dt>
                        <dd class="text-black-600 sm:col-span-2 ">
                            {{ $batch->expiry_date ? $batch->expiry_date->format('M d, Y') : 'N/A' }}
                        </dd>
                    </div>
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Date Added</dt>
                        <dd class="text-black-600 sm:col-span-2 ">
                            {{ $batch->created_at ? $batch->created_at->format('M d, Y') : 'N/A' }}
                        </dd>
                    </div>
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Status</dt>
                        <dd class="sm:col-span-2">
                            <span class="text-sm text-black-600 capitalize">
                                {{ $batch->status ?? 'Active' }}
                            </span>
                        </dd>
                    </div>
                </dl>
            </div>

            <div class=" px-6 py-4 border-t border-gray-100 flex items-center gap-20">
                <a href="{{ route('vendor.batches.index') }}" class="inline-flex items-center gap-1.5 px-3 py-2 border border-gray-300 bg-indigo-500 text-sm font-semibold text-white rounded-lg hover:bg-indigo-700 transition shadow-sm">
                    <i data-lucide="circle-arrow-left" class="w-5 h-5"></i> Back 
                </a>
                <p class="flex items-center gap-2 text-sm text-gray-600">

                    <span class="flex items-center gap-2 bg-indigo-100 text-indigo-800 px-3 py-1 rounded-lg border border-indigo-200">
                        <i data-lucide="lightbulb" class="w-5 h-5 text-indigo-500 flex-shrink-0"></i>
                        <span class="font-bold">Note:</span>
                        This was added by Clerk {{ $batch->user->first_name }} {{ $batch->user->last_name }}
                    </span>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>