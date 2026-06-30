<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Batch Details') }}</h2>
    </x-slot>

    <div class="py-4 max-w-2xl mx-auto">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/70">
                <h3 class="text-base font-bold text-gray-700">Batch details for product: {{ $batch->product->product_name }}</h3>
            </div>

            <div class="border-t border-gray-100">
                <dl class="divide-y divide-gray-100 text-sm">
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Product Name</dt>
                        <dd class=" text-gray-600 sm:col-span-2">{{ $batch->product->product_name }}</dd>
                    </div>
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Quantity</dt>
                        <dd class="text-gray-600 sm:col-span-2 ">{{ $batch->quantity }} units</dd>
                    </div>
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Total Cost</dt>
                        <dd class="text-gray-600 sm:col-span-2   ">{{ number_format($batch->total_price, 2) }}</dd>
                    </div>
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Manufacture date</dt>
                        <dd class="text-gray-600 sm:col-span-2  ">
                            <span class="text-sm mr-4">{{ $batch->manufacture_date }}</span>
                        </dd>
                    </div>
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Expiry date</dt>
                        <dd class="text-gray-600 sm:col-span-2  ">
                        <span class="text-sm mr-4">{{ $batch->expiry_date }}</span>
                        </dd>
                    </div>
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Status</dt>
                        <dd class="sm:col-span-2">
                            <span class="text-sm mr-4 text-gray-600">
                                {{ $batch->status }}
                            </span>
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex items-center gap-2 justify-between">
                <a href="{{ route('batches.index') }}" class="inline-flex items-center gap-1.5 px-3 py-2 border border-gray-300 bg-white text-sm font-semibold text-gray-700 rounded-lg hover:bg-gray-50 transition shadow-sm">
                    <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Back 
                </a>
                <a href="{{ route('batches.edit', $batch->batch_id) }}" class="inline-flex items-center gap-1.5 px-3 py-2 bg-amber-500 text-white text-sm font-bold rounded-lg hover:bg-amber-600 transition shadow-sm">
                    <i data-lucide="square-pen" class="w-3.5 h-3.5"></i> Edit Batch
                </a>
            </div>
        </div>
    </div>
</x-app-layout>