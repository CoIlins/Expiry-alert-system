<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory Clerk Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Welcome -->
            <div class="bg-white rounded-xl shadow-sm p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Welcome, {{ Auth::user()->name }} 👋</h3>
                    <p class="text-gray-500 mt-1">{{ now()->format('l, F j, Y') }} — Here's what needs attention today.</p>
                </div>
                <a href="#"
                   class="px-5 py-2 bg-indigo-600 text-white text-sm rounded-lg hover:bg-indigo-700 transition">
                    + Add Stock Entry
                </a>
            </div>

            <!-- Stat Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-indigo-500">
                    <p class="text-sm text-gray-500">Items to Check Today</p>
                    <p class="text-4xl font-bold text-gray-800 mt-2">14</p>
                    <p class="text-xs text-gray-400 mt-1">Scheduled verifications</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
                    <p class="text-sm text-gray-500">Entries This Week</p>
                    <p class="text-4xl font-bold text-green-600 mt-2">37</p>
                    <p class="text-xs text-gray-400 mt-1">Stock records added</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-400">
                    <p class="text-sm text-gray-500">Expiring Soon</p>
                    <p class="text-4xl font-bold text-yellow-500 mt-2">11</p>
                    <p class="text-xs text-gray-400 mt-1">Need expiry update</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-red-500">
                    <p class="text-sm text-gray-500">Expired Items</p>
                    <p class="text-4xl font-bold text-red-500 mt-2">3</p>
                    <p class="text-xs text-gray-400 mt-1">Flag for removal</p>
                </div>

            </div>

            <!-- Secondary Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-400">
                    <p class="text-sm text-gray-500">Total Stock Entries</p>
                    <p class="text-3xl font-bold text-blue-500 mt-2">284</p>
                    <p class="text-xs text-gray-400 mt-1">All time by you</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-400">
                    <p class="text-sm text-gray-500">Last Entry</p>
                    <p class="text-xl font-bold text-purple-500 mt-2">Today, 9:42 AM</p>
                    <p class="text-xs text-gray-400 mt-1">Batch #2041 — Dairy</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-orange-400">
                    <p class="text-sm text-gray-500">Pending Updates</p>
                    <p class="text-3xl font-bold text-orange-500 mt-2">6</p>
                    <p class="text-xs text-gray-400 mt-1">Items missing expiry dates</p>
                </div>

            </div>

            <!-- Tasks Banner -->
            <div class="bg-indigo-50 border border-indigo-200 rounded-xl p-6">
                <h4 class="font-semibold text-indigo-700">📋 Today's Tasks</h4>
                <ul class="mt-3 space-y-2 text-sm text-indigo-700">
                    <li>• Verify expiry dates on 14 scheduled items in Aisle 3 and Aisle 7.</li>
                    <li>• Update the 6 stock entries that are missing expiry information.</li>
                    <li>• Flag the 3 expired items for supervisor review and removal.</li>
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>