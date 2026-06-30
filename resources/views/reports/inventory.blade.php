<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Inventory Report') }}
            </h2>
            <div class="">
                <button  class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white font-semibold text-sm rounded-lg hover:bg-indigo-700 transition shadow-sm" >
                    <i data-lucide="download" class="w-4 h-4"></i>
                    Download Report
                </button>
            </div>
        </div>
    </x-slot>

    <div class="py-4 space-y-6">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Valuation</span>
                <div class="mt-2 text-2xl font-extrabold text-emerald-600">${{ number_format($totalInventoryValue, 2) }}</div>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Stock Units</span>
                <div class="mt-2 text-2xl font-extrabold text-indigo-600">{{ number_format($totalItems) }} <span class="text-xs font-normal text-gray-500">items</span></div>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Expired Batches</span>
                <div class="mt-2 text-2xl font-extrabold text-rose-600">{{ $expiredCount }}</div>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Expiring Soon</span>
                <div class="mt-2 text-2xl font-extrabold text-amber-600">{{ $expiringSoonCount }}</div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">         
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse whitespace-nowrap">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-sm font-sans text-gray-700 uppercase tracking-wider">
                            <th class="px-4 py-4 w-12 text-center">No.</th>
                            <th class="px-6 py-4">Product ID</th>
                            <th class="px-6 py-4">Product Name</th>
                            <th class="px-6 py-4">Category</th>
                            <th class="px-6 py-4">Clerk Name</th>
                            <th class="px-6 py-4">Batch ID</th>
                            <th class="px-6 py-4">Date Received</th>
                            <th class="px-6 py-4">Expiry Date</th>
                            <th class="px-6 py-4">Current Stock</th>
                            <th class="px-6 py-4">Unit Price</th>
                            <th class="px-6 py-4">Total Price</th>
                            <th class="px-6 py-4">Stock Level</th>
                            {{-- <th class="px-6 py-4 text-center w-36">Expiry Status</th> --}}
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-sm text-gray-700 font-normal">
                        @forelse($batches as $batch)
                            <tr class="hover:bg-gray-100 transition-all">
                                <td class="px-6 py-4 font-sans text-sm text-gray-900">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-6 py-4 font-sans text-sm text-gray-900">
                                    {{ $batch->product_id }}
                                </td>

                                <td class="px-6 py-4 font-sans text-sm text-gray-900">
                                    {{ $batch->product->product_name ?? '' }}
                                </td>
                                
                                <td class="px-6 py-4">
                                    <span class="px-6 py-4 font-sans text-sm text-gray-900">
                                        {{ $batch->product->category ?? '' }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 font-sans text-sm text-gray-900">
                                    {{ $batch->user->first_name ?? '' }}
                                </td>

                                <td class="px-6 py-4 font-sans text-sm text-gray-900">
                                    {{ $batch->batch_id }}
                                </td>

                                <td class="px-6 py-4 font-sans text-sm text-gray-900">
                                    {{ $batch->created_at ? $batch->created_at->format('M d, Y') : '' }}
                                </td>
                                <td class="px-6 py-4 font-sans text-sm text-gray-900">
                                    {{ $batch->expiry_date ? $batch->expiry_date->format('M d, Y') : '' }}
                                </td>
                                <td class="px-6 py-4 font-sans text-sm text-gray-900">
                                    {{ $batch->quantity ? :'' }}
                                </td>

                                <td class="px-6 py-4 font-sans text-sm text-gray-900">
                                    {{ number_format($batch->product->price ?? 0, 2) }}
                                </td>
                                <td class="px-6 py-4 font-sans text-sm text-gray-900">
                                    {{ number_format($batch->total_price, 2) }}
                                </td>
                                
                                {{-- <td class="px-6 py-4">
                                    @if($batch->quantity == 0)
                                        <span class="inline-flex items-center text-xs font-bold text-rose-600">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-600 mr-1.5 animate-pulse"></span> Out of Stock
                                        </span>
                                    @elseif($batch->quantity <= 5)
                                        <span class="inline-flex items-center text-xs font-semibold text-amber-600">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5"></span> Low Stock ({{ $batch->quantity }})
                                        </span>
                                    @else
                                        <span class="inline-flex items-center text-xs text-gray-600">
                                            <span class="w-1.5 h-1.5 rounded-full bg-gray-300 mr-1.5"></span> Good ({{ $batch->quantity }})
                                        </span>
                                    @endif
                                </td> --}}

                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border shadow-sm tracking-wide
                                        {{ $batch->computed_status === 'active' ? 'bg-green-50 text-green-700 border-green-200' : '' }}
                                        {{ $batch->computed_status === 'expiring_soon' ? 'bg-amber-50 text-amber-700 border-amber-200' : '' }}
                                        {{ $batch->computed_status === 'expired' ? 'bg-rose-50 text-rose-700 border-rose-200' : '' }}
                                    ">
                                        @if($batch->computed_status === 'active') Active
                                        @elseif($batch->computed_status === 'expiring_soon') Expiring soon
                                        @elseif($batch->computed_status === 'expired') Expired
                                        @else {{ ucfirst($batch->computed_status) }} @endif
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="px-6 py-12 text-center text-gray-400 font-medium bg-gray-50/50">
                                    <div class="text-gray-500 text-sm">No batches in the inventory</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
