<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="bg-white rounded-xl shadow-sm p-6 border border-slate-200">
                <h3 class="text-lg font-semibold text-gray-800">
                    Welcome back, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                </h3>
                <p class="text-gray-500 mt-1">System-wide overview from the current database.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-indigo-500">
                    <p class="text-sm text-gray-500">Total Products</p>
                    <p class="text-4xl font-bold text-gray-800 mt-2">{{ number_format($totalProductsCount) }}</p>
                    <p class="text-xs text-gray-400 mt-1">Products in the catalog</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-400">
                    <p class="text-sm text-gray-500">Expiring Soon</p>
                    <p class="text-4xl font-bold text-yellow-500 mt-2">{{ number_format($expiringSoonCount) }}</p>
                    <p class="text-xs text-gray-400 mt-1">Products with batches expiring within 30 days</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-red-500">
                    <p class="text-sm text-gray-500">Expired Products</p>
                    <p class="text-4xl font-bold text-red-500 mt-2">{{ number_format($expiredProductsCount) }}</p>
                    <p class="text-xs text-gray-400 mt-1">Products with expired batches</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
                    <p class="text-sm text-gray-500">Total Users</p>
                    <p class="text-4xl font-bold text-green-600 mt-2">{{ number_format($totalUsersCount) }}</p>
                    <p class="text-xs text-gray-400 mt-1">Registered system users</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-400">
                    <p class="text-sm text-gray-500">Active Vendors</p>
                    <p class="text-3xl font-bold text-blue-500 mt-2">{{ number_format($activeVendorsCount) }}</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-pink-400">
                    <p class="text-sm text-gray-500">Inventory Clerks</p>
                    <p class="text-3xl font-bold text-pink-500 mt-2">{{ number_format($inventoryClerksCount) }}</p>
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
                <h4 class="font-semibold text-gray-800">System Alerts</h4>

                @if($expiredProductsCount > 0 || $expiringThisWeekCount > 0)
                    <ul class="mt-3 space-y-2 text-sm text-gray-700">
                        @if($expiredProductsCount > 0)
                            <li class="text-red-600">
                                {{ number_format($expiredProductsCount) }} product(s) have expired batches and need review.
                            </li>
                        @endif

                        @if($expiringThisWeekCount > 0)
                            <li class="text-yellow-700">
                                {{ number_format($expiringThisWeekCount) }} product(s) have batches expiring within the next 7 days.
                            </li>
                        @endif
                    </ul>
                @else
                    <p class="mt-3 text-sm text-gray-500">No urgent expiry alerts from the current batch records.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
