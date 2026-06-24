<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory Clerk Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="bg-white rounded-xl shadow-sm p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Welcome, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} 👋</h3>
                    <p class="text-gray-500 mt-1">{{ now()->format('l, F j, Y') }} — Here's what needs attention today.</p>
                </div>
                <a href="{{ route('products.create') }}"
                   class="px-5 py-2 bg-indigo-600 text-white text-sm rounded-lg hover:bg-indigo-700 transition font-medium shadow-sm">
                    + Add New Product Profile
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-indigo-500">
                    <p class="text-sm text-gray-500">Items to Check Today</p>
                    <p class="text-4xl font-bold text-gray-800 mt-2">{{ $itemsToCheckToday }}</p>
                    <p class="text-xs text-gray-400 mt-1">Scheduled schema validations</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
                    <p class="text-sm text-gray-500">Total Unique Profiles</p>
                    <p class="text-4xl font-bold text-green-600 mt-2">{{ $totalProductsCount }}</p>
                    <p class="text-xs text-gray-400 mt-1">Active items in catalog</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-400">
                    <p class="text-sm text-gray-500">Expiring Soon</p>
                    <p class="text-4xl font-bold text-yellow-500 mt-2">{{ $expiringSoonCount }}</p>
                    <p class="text-xs text-gray-400 mt-1">Approaching expiration window</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-red-500">
                    <p class="text-sm text-gray-500">Expired Items</p>
                    <p class="text-4xl font-bold text-red-500 mt-2">{{ $expiredCount }}</p>
                    <p class="text-xs text-gray-400 mt-1">Flag for standard removal</p>
                </div>

            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-400">
                    <p class="text-sm text-gray-500">Total Database Records</p>
                    <p class="text-3xl font-bold text-blue-500 mt-2">{{ $totalProductsCount }}</p>
                    <p class="text-xs text-gray-400 mt-1">All time system catalog entries</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-400">
                    <p class="text-sm text-gray-500">Last Entry</p>
                    <p class="text-xl font-bold text-purple-500 mt-2">
                        {{ $lastProduct ? $lastProduct->created_at->diffForHumans() : 'No entries yet' }}
                    </p>
                    <p class="text-xs text-gray-400 mt-1 truncate">
                        {{ $lastProduct ? $lastProduct->product_name . ' — ' . $lastProduct->category : 'Database empty' }}
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-orange-400">
                    <p class="text-sm text-gray-500">Incomplete Profiles</p>
                    <p class="text-3xl font-bold text-orange-500 mt-2">{{ $pendingUpdatesCount }}</p>
                    <p class="text-xs text-gray-400 mt-1">Missing specifications or descriptions</p>
                </div>

            </div>

            <div class="bg-indigo-50 border border-indigo-200 rounded-xl p-6">
                <h4 class="font-semibold text-indigo-700">📋 Action Items Required</h4>
                <ul class="mt-3 space-y-2 text-sm text-indigo-700">
                    <li>• Verify structural attributes or batches linked on the <strong class="font-bold">{{ $itemsToCheckToday }}</strong> items requiring attention today.</li>
                    <li>• Update the <strong class="font-bold">{{ $pendingUpdatesCount }}</strong> baseline profile schemas that are currently missing descriptive specifications text entries.</li>
                    <li>• Isolate the <strong class="font-bold">{{ $expiredCount }}</strong> flagged expired database items for prompt removal review.</li>
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>