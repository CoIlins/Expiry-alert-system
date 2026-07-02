<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All batches') }}
        </h2>
    </x-slot>

    <div class="py-1 max-w-8xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-8xl bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
            
            <div class="w-full overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-max">
                    <thead>
                        <tr class="bg-indigo-100 border-b border-gray-200 text-sm font-bold text-black uppercase whitespace-nowrap">
                            <th class="px-3 py-4">No.</th>
                            <th class="px-3 py-4">Product </th>
                            <th class="px-3 py-4">Quantity</th>
                            <th class="px-3 py-4">Total price</th>
                            <th class="px-3 py-4">Clerk</th>
                            <th class="px-3 py-4">Man. Date</th>
                            <th class="px-3 py-4">Expiry date</th>
                            <th class="px-3 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm text-black whitespace-nowrap">
                        @foreach($batches as $batch)
                            <tr class="hover:bg-gray-100">
                                <td class="px-2 py-4 text-center font-medium text-black-500 bg-gray-50/30 w-12">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-3 py-4 text-black">
                                    {{ $batch->product->product_name ?? '' }}
                                </td>
                                <td class="px-3 py-4 text-black ">
                                    {{ number_format($batch->quantity) }}
                                </td>
                                <td class="px-3 py-4 text-black ">
                                    Ksh. {{ number_format($batch->total_price, 2) }}
                                </td>
                                <td class="px-3 py-4">
                                    <span class="bg-indigo-100 text-indigo-700 rounded-lg text-sm px-2 py-1 inline-block">
                                        {{ $batch->user->user_id === auth()->id() ? 'You (Vendor)' : $batch->user->first_name . ' ' . $batch->user->last_name }}
                                    </span>
                                </td>
                                <td class="px-3 py-4 text-black ">
                                    {{ $batch->manufacture_date ? $batch->manufacture_date->format('M d, Y') : 'N/A' }}
                                </td>
                                <td class="px-3 py-4 text-black ">
                                    {{ $batch->expiry_date ? $batch->expiry_date->format('M d, Y') : 'N/A' }}
                                </td>
                            </td>
                            <td class="px-3 py-4 text-center whitespace-nowrap">
                                    <div class="inline-flex items-center justify-center gap-1">
                                        <a href="{{ route('vendor.batches.show', $batch->batch_id) }}" 
                                        class="flex items-center gap-2 font-semibold p-2 bg-indigo-500 text-white rounded hover:bg-indigo-700 transition shadow-sm" 
                                        title="View Details">

                                            <i data-lucide="telescope" class="w-5 h-5"></i> View Batch

                                        </a>
                                    </div>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="flex items-center justify-between border-t border-gray-200 bg-gray-50 px-8 py-2">
                <a href="{{ route('vendor.dashboard') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg border border-gray-300 bg-indigo-600 text-sm font-semibold text-white hover:bg-indigo-700 transition shadow-sm">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i> Back to dashboard
                </a>
                
                @if($batches->hasPages())
                    <div>
                        {{ $batches->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>