<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Stock overview') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-4 space-y-6">
        
        @if(session('success'))
            <div class="p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 rounded-r-lg shadow-sm flex items-center justify-between" id="status-alert">
                <span class="text-sm font-medium"> {{ session('success') }}</span>
                <button onclick="document.getElementById('status-alert').remove()" class="text-emerald-400 hover:text-emerald-600 transition text-lg font-bold leading-none">
                    &times;
                </button>
            </div>
        @endif

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-4">
            <form action="{{ route('stocks.index') }}" method="GET" class="flex flex-col md:flex-row gap-3 items-stretch md:items-center justify-between">
                
                <div class="relative flex-1 max-w-xl">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search stock by product name, stock level and stock status" class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-black-500 focus:border-black-500 transition">
                </div>

                <div class="flex flex-wrap items-center gap-2 justify-end">
                    <button type="submit" class="flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white font-medium text-sm rounded-lg hover:bg-black-700 font-semibold transition shadow-sm">
                         <i data-lucide="search" class="w-5 h-5"> </i> Search
                    </button>
                    <a href="{{ route('stocks.index') }}" class="flex items-center gap-2 p-2 bg-cyan-600 text-white text-sm font-semibold rounded-lg hover:bg-cyan-800 transition shadow-sm" title="Reset search bar">
                        <i data-lucide="brush-cleaning" class="w-5 h-5"> </i> Clear
                    </a>
                    <a href="{{ route('stocks.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-amber-600 text-white font-semibold text-sm rounded-lg hover:bg-amber-700 transition shadow-sm">
                        <i data-lucide="plus" class="w-5 h-5"> </i> Add stock thresholds
                    </a>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            {{-- <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/70">
                <h3 class="text-base font-bold text-gray-700">All Stock Statuses</h3>
            </div> --}}
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-xs font-bold text-black-700 uppercase tracking-wider">
                            <th class="px-4 py-4 w-12 text-center">Number</th>
                            <th class="px-6 py-4">Product Name</th>
                            <th class="px-6 py-4">Stock Level</th>
                            <th class="px-6 py-4">Low Stock Threshold</th>
                            <th class="px-6 py-4">High Stock Threshold</th>
                            <th class="px-6 py-4 text-center">Status</th>
                            <th class="px-6 py-4 text-center w-36">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-sm text-gray-700 font-normal">
                        @forelse($stocks as $stock)
                            <tr class="hover:bg-gray-50/80 transition-all">
                                <td class="px-4 py-4 text-center font-medium text-black-500 bg-gray-50/30 w-12">
                                    {{ $loop->iteration }}
                                </td>
                                
                                <td class="px-6 py-4 font-semibold text-black-600">
                                    <a href="{{ route('stocks.show', $stock->id) }}" class="hover:text-indigo-600 transition">
                                        {{ $stock->product->product_name ?? 'Unknown Product' }}
                                    </a>
                                </td>
                                
                                <td class="px-6 py-4 font-semibold text-black-600 ">
                                    {{ $stock->current_stock_level }} units
                                </td>

                                <td class="px-6 py-4 font-semibold text-black-600 ">
                                    {{ $stock->low_stock_threshold }} units
                                </td>

                                <td class="px-6 py-4 font-semibold text-black-600 ">
                                    {{ $stock->high_stock_threshold }} units
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
                                        <a href="{{ route('stocks.show', $stock->id) }}" 
                                           class="p-2 bg-indigo-500 text-white rounded hover:bg-indigo-700 transition shadow-sm" 
                                           title="View Details">
                                            <i data-lucide="telescope" class="w-5 h-5"></i>
                                        </a>

                                        <a href="{{ route('stocks.edit', $stock->id) }}" 
                                           class="p-2 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition shadow-sm" 
                                           title="Edit Thresholds">
                                            <i data-lucide="pen-line" class="w-5 h-5"></i>
                                        </a>

                                        {{-- <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" class="inline m-0 p-0" onsubmit="return confirm('Are you sure you want to remove this alert monitor configuration?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="p-2 bg-rose-500 text-white rounded hover:bg-rose-600 transition shadow-sm" 
                                                    title="Delete Stock">
                                                <i data-lucide="shredder" class="w-4 h-4"></i>
                                            </button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-gray-400 font-medium bg-gray-50/50">
                                    <div class="text-gray-500 text-sm">No monitored stock available</div><br>
                                    <a href="{{ route('stocks.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-green-600 text-white font-semibold text-sm rounded-lg hover:bg-green-700 transition shadow-sm">
                                        Try adding stock thresholds!
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>