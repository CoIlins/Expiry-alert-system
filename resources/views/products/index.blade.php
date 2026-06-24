<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Products') }}
            </h2>
            <div class="text-sm text-gray-500 breadcrumbs">
                <span class="hover:text-gray-700">Home</span> <span class="mx-1">/</span> <span class="text-gray-800 font-medium">Products</span>
            </div>
        </div>
    </x-slot>

    <div class="py-4 space-y-6">
        
        @if(session('success'))
            <div class="p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 rounded-r-lg shadow-sm flex items-center justify-between" id="status-alert">
                <span class="text-sm font-medium">✨ {{ session('success') }}</span>
                <button onclick="document.getElementById('status-alert').remove()" class="text-emerald-400 hover:text-emerald-600 transition text-lg font-bold leading-none">
                    &times;
                </button>
            </div>
        @endif

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-4">
            <form action="{{ route('products.index') }}" method="GET" class="flex flex-col md:flex-row gap-3 items-stretch md:items-center justify-between">
                
                <div class="relative flex-1 max-w-md">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Products by Name..." class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                </div>

                <div class="flex flex-wrap items-center gap-2 justify-end">
                    <button type="submit" class="px-4 py-2 bg-slate-800 text-white font-medium text-sm rounded-lg hover:bg-slate-900 transition shadow-sm">
                        🔍 Filter
                    </button>
                    <a href="{{ route('products.index') }}" class="p-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition shadow-sm" title="Reset Table">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.253 8H18"></path>
                        </svg>
                    </a>
                    <a href="{{ route('products.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-blue-600 text-white font-semibold text-sm rounded-lg hover:bg-blue-700 transition shadow-sm">
                        <span>➕</span> Add New Product
                    </a>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/70">
                <h3 class="text-base font-bold text-gray-700">All Products</h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <th class="px-4 py-4 w-12 text-center">#</th>
                            <th class="px-6 py-4">Product Name</th>
                            <th class="px-6 py-4">Supplier Name</th>

                            <th class="px-6 py-4">Category</th>
                            <th class="px-6 py-4">Created At</th>
                            <th class="px-6 py-4 text-center w-36">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-sm text-gray-700 font-normal">
                        @forelse($products as $product)
                            <tr class="hover:bg-gray-50/80 transition-all">
                                <td class="px-4 py-4 text-center font-medium text-gray-500 bg-gray-50/30 w-12">
                                    {{ $loop->iteration }}
                                </td>
                                
                                <td class="px-6 py-4 font-semibold text-blue-600 hover:underline cursor-pointer">
                                    {{ $product->product_name }}
                                </td>
                                
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    @if($product->supplier)
                                        {{ $product->supplier->first_name }} {{ $product->supplier->last_name }}
                                        @if(!empty($product->supplier->business_name))
                                            <span class="block text-xs text-gray-400 font-normal">({{ $product->supplier->business_name }})</span>
                                        @endif
                                    @else
                                        <span class="text-xs italic text-gray-400">No Supplier Linked</span>
                                    @endif
                                </td>


                                
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-gray-100 text-gray-800 border border-gray-200">
                                        {{ $product->category }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-gray-500 text-xs font-mono whitespace-nowrap">
                                    {{ $product->created_at ? $product->created_at->format('M d, Y') : 'N/A' }}
                                </td>
                                
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <div class="inline-flex items-center justify-center gap-1">
                                        <a href="{{ route('products.show', $product->product_id) }}" class="p-2 bg-cyan-400 text-white rounded hover:bg-cyan-500 transition shadow-sm" title="View Details">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </a>

                                        <a href="{{ route('products.edit', $product->product_id) }}" class="p-2 bg-amber-400 text-white rounded hover:bg-amber-500 transition shadow-sm" title="Edit Attributes">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                            </svg>
                                        </a>

                                        <form action="{{ route('products.destroy', $product->product_id) }}" method="POST" class="inline m-0 p-0" onsubmit="return confirm('Are you sure you want to permanently delete this product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 bg-rose-500 text-white rounded hover:bg-rose-600 transition shadow-sm" title="Delete Product">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-gray-400 font-medium bg-gray-50/50">
                                    📭 No matching product profiles found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>