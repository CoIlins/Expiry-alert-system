<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">All products</h2></x-slot>
    <div class="py-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-indigo-100 border-b border-gray-200 text-sm font-bold text-black uppercase">
                        <th class="px-6 py-4">Number </th>
                        <th class="px-6 py-4">Product Name</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Unit Price</th>
                        <th class="px-6 py-4">Registered By</th>
                        <th class="px-6 py-4 ">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm text-black">
                    @foreach($products as $product)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-4 text-center font-medium text-black-500 bg-gray-50/30 w-12">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4  ">{{ $product->product_name }}</td>
                            <td class="px-6 py-4">{{ $product->category }}</td>
                            <td class="px-6 py-4 ">Ksh. {{ number_format($product->price, 2) }}</td>
                            <td class="px-6 py-4">
                                <span class="bg-indigo-100 text-indigo-700 rounded-lg  text-sm px-2 py-1 ">
                                    {{ $product->clerk->user_id === auth()->id() ? '' : $product->clerk->first_name . ' ' . $product->clerk->last_name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <div class="inline-flex items-center justify-center gap-1">
                                        <a href="{{ route('vendor.products.show', $product->product_id) }}" 
                                        class="flex items-center gap-2 font-semibold p-2 bg-indigo-500 text-white rounded hover:bg-indigo-700 transition shadow-sm" 
                                        title="View Details">

                                            <i data-lucide="telescope" class="w-5 h-5"></i> View product

                                        </a>
                                    </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                <div class="flex items-center justify-end gap-2 border-t border-gray-200 bg-gray-50 px-8 py-2 justify-between">
                    <a href="{{ route('vendor.dashboard') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg border border-gray-300 bg-indigo-600 text-sm font-semibold text-white hover:bg-indigo-700 transition shadow-sm">
                        <i data-lucide="layout-dashboard" class="w-5 h-5"> </i> Back to dashboard
                    </a>
                </div>
        </div>
    </div>
</x-app-layout>