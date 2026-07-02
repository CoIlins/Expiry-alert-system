<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Stock overview') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse whitespace-nowrap">
                    <thead>
                        <tr class="bg-indigo-100 border-b border-gray-200 text-sm font-bold text-black uppercase tracking-wider">
                            <th class="px-6 py-4 w-12 text-center">Number</th>
                            <th class="px-6 py-4">Product</th>
                            <th class="px-6 py-4">Stock Level</th>
                            <th class="px-6 py-4">Clerk</th>
                            <th class="px-6 py-4 text-center">Status</th>
                            <th class="px-6 py-4 text-center w-36">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-sm text-black font-normal">
                        @forelse($stocks as $stock)
                            <tr class="hover:bg-gray-100 transition-all">
                                <td class="px-2 py-4 text-center font-medium text-black-500 bg-gray-50/30 w-12">
                                    {{ $loop->iteration }}
                                </td>
                                
                                <td class="px-3 py-4  text-black-600">
                                    
                                        {{ $stock->product->product_name ?? '' }}

                                </td>
                                
                                <td class="px-6 py-4 text-black">
                                    {{ number_format($stock->current_stock_level) }} units
                                </td>

                                <td class="px-6 py-4">
                                    <span class="bg-indigo-100 text-indigo-700 rounded-lg text-sm px-2 py-1 font-medium">
                                        {{ $stock->clerk->user_id === auth()->id() ? 'You' : $stock->clerk->first_name . ' ' . $stock->clerk->last_name }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded text-sm font-bold border 
                                        {{ $stock->status === 'No Stock' ? 'bg-rose-50 text-rose-700 border-rose-200' : '' }}
                                        {{ $stock->status === 'Low Stock' ? 'bg-amber-50 text-amber-700 border-amber-200' : '' }}
                                        {{ $stock->status === 'In Stock' ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : '' }}
                                        {{ $stock->status === 'Overstocked' ? 'bg-blue-50 text-blue-700 border-blue-200' : '' }}">
                                        {{ $stock->status }}
                                    </span>
                                </td>
                                
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <div class="inline-flex items-center justify-center gap-1">
                                        <a href="{{ route('vendor.stocks.show', $stock->id) }}" 
                                           class="flex items-center gap-2 font-semibold p-2 bg-indigo-500 text-white rounded hover:bg-indigo-700 transition shadow-sm text-sm" 
                                           title="View Details">
                                            <i data-lucide="telescope" class="w-4 h-4"></i> View Stock
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center text-gray-400 font-medium bg-gray-50/50">
                                    <div class="text-gray-500 text-sm">Whoops! No monitored stock levels have been saved by your clerks yet.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="flex items-center justify-between border-t border-gray-200 bg-gray-50 px-8 py-2">
                <a href="{{ route('vendor.dashboard') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg border border-gray-300 bg-indigo-600 text-sm font-semibold text-white hover:bg-indigo-700 transition shadow-sm">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i> Back to dashboard
                </a>

                @if($stocks->hasPages())
                    <div>
                        {{ $stocks->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>