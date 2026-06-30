<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Batch Overview') }}</h2>
        </div>
    </x-slot>

    <div class="py-4 space-y-6">
        @if(session('success'))
            <div class="p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 rounded-r-lg shadow-sm flex items-center justify-between" id="status-alert">
                <span class="text-sm font-medium">{{ session('success') }}</span>
                <button onclick="document.getElementById('status-alert').remove()" class="text-emerald-400 hover:text-emerald-600 text-lg font-bold">&times;</button>
            </div>
        @endif

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-4">
            <form action="{{ route('batches.index') }}" method="GET" class="flex flex-col md:flex-row gap-3 items-stretch md:items-center justify-between">
                <div class="relative flex-1 max-w-xl">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search batch by name, quantity, manufacture date or expiry date" class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 transition">
                </div>
                <div class="flex flex-wrap items-center gap-2 justify-end">
                    <button type="submit" class="flex items-center gap-2 px-4 py-2 bg-amber-600 text-white text-sm font-semibold rounded-lg hover:bg-amber-700 transition shadow-sm">
                         <i data-lucide="search" class="w-5 h-5"></i> Search
                    </button>
                    <a href="{{ route('batches.index') }}" class="flex items-center gap-2 p-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition shadow-sm">
                        <i data-lucide="eraser" class="w-5 h-5"></i> Clear
                    </a>
                    <a href="{{ route('batches.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-green-600 text-white font-semibold text-sm rounded-lg hover:bg-green-700 transition shadow-sm">
                        <i data-lucide="square-plus" class="w-5 h-5"></i> Add Batch
                    </a>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/70">
                <h3 class="text-base font-bold text-gray-700">All Batches</h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <th class="px-4 py-4 w-12 text-center">Number</th>
                            <th class="px-6 py-4">Product Name</th>
                            <th class="px-6 py-4">Quantity</th>
                            <th class="px-6 py-4">Total Cost</th>

                            <th class="px-6 py-4">Man. Date</th>
                            <th class="px-6 py-4">Exp. Date</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-center w-36">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                        @forelse($batches as $batch)
                            <tr class="hover:bg-gray-50/80 transition-all">
                                <td class="px-4 py-4 text-center font-medium bg-gray-50/30 w-12">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 font-semibold text-black-600 ">
                                    <a>{{ $batch->product->product_name }}</a>
                                </td>
                                <td class="px-6 py-4 font-semibold">{{ $batch->quantity }}</td>
                                <td class="px-6 py-4 font-semibold text-black-600 ">{{ number_format($batch->total_price, 2) }}</td>
                                <td class="px-6 py-4 font-semibold">{{ $batch->manufacture_date->format('Y-m-d') }}</td>
                                <td class="px-6 py-4 font-semibold">{{ $batch->expiry_date->format('Y-m-d') }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-xl text-sm font-bold 
                                        {{ $batch->computed_status === 'active' ? 'bg-green-50 text-green-700 border border-green-200' : '' }}
                                        {{ $batch->computed_status === 'expiring_soon' ? 'bg-amber-50 text-amber-700 border border-amber-200' : '' }}
                                        {{ $batch->computed_status === 'expired' ? 'bg-rose-50 text-rose-700 border border-rose-200' : '' }}
                                    ">
                                        @if($batch->computed_status === 'active')
                                                    Active
                                                @elseif($batch->computed_status === 'expiring_soon')
                                                    Expiring Soon
                                                @elseif($batch->computed_status === 'expired')
                                                    Expired
                                                @else
                                                    {{ ucfirst(str_replace('_', ' ', $batch->computed_status)) }}
                                                @endif
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <div class="inline-flex items-center justify-center gap-1">
                                        <a href="{{ route('batches.show', $batch->batch_id) }}" class="p-2 bg-green-500 text-white rounded hover:bg-green-700 transition flex items-center justify-center">
                                            <i data-lucide="telescope" class="w-5 h-5"></i></a>
                                        <a href="{{ route('batches.edit', $batch->batch_id) }}" class="p-2 bg-indigo-500 text-white rounded hover:bg-indigo-700 transition flex items-center justify-center">
                                            <i data-lucide="pencil" class="w-5 h-5"></i></a>
                                        <form action="{{ route('batches.destroy', $batch->batch_id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this batch record?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2 bg-rose-500 text-white rounded hover:bg-rose-600 transition flex items-center justify-center">
                                                <i data-lucide="trash-2" class="w-5 h-5"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-400 font-medium bg-gray-50/50">
                                    <div class="text-gray-500 text-xl mb-4">No batches found</div>
                                    <a href="{{ route('batches.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-green-600 text-white font-semibold text-sm rounded-lg hover:bg-green-700 transition shadow-sm">Try adding a batch!</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>