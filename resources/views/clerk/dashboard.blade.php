
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory Clerk Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white rounded-xl shadow-sm p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 border border-slate-200">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Welcome, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}! 👋</h3>
                    <p class="text-gray-500 text-sm mt-0.5">System database overview control unit.</p>
                </div>
                
                <a href="{{ route('products.create') }}"
                   class="px-5 py-2.5 bg-indigo-600 text-white text-xs font-bold uppercase tracking-wider rounded-lg hover:bg-indigo-700 transition font-medium shadow-sm flex items-center gap-2">
                     Add Product
                </a>
            </div>

            {{-- <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-indigo-500 border border-y-slate-200 border-r-slate-200 max-w-sm">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Products</p>
                <div class="flex items-baseline gap-2 mt-2">
                    <p class="text-5xl font-black text-gray-800 tracking-tight">{{ $totalProductsCount }}</p>
                    <span class="text-slate-400 text-xs font-medium">items cataloged</span>
                </div>
            </div> --}}

        </div>
    </div>
</x-app-layout>

