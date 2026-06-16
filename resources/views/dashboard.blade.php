<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Welcome -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800">Welcome back, {{ Auth::user()->name }} 👋</h3>
                <p class="text-gray-500 mt-1">Here's a system-wide overview for today.</p>
            </div>

            <!-- Stat Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-indigo-500">
                    <p class="text-sm text-gray-500">Total Products</p>
                    <p class="text-4xl font-bold text-gray-800 mt-2">1,284</p>
                    <p class="text-xs text-gray-400 mt-1">Across all vendors</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-400">
                    <p class="text-sm text-gray-500">Expiring Soon</p>
                    <p class="text-4xl font-bold text-yellow-500 mt-2">87</p>
                    <p class="text-xs text-gray-400 mt-1">Within the next 30 days</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-red-500">
                    <p class="text-sm text-gray-500">Expired Products</p>
                    <p class="text-4xl font-bold text-red-500 mt-2">23</p>
                    <p class="text-xs text-gray-400 mt-1">Requires immediate action</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
                    <p class="text-sm text-gray-500">Total Users</p>
                    <p class="text-4xl font-bold text-green-600 mt-2">56</p>
                    <p class="text-xs text-gray-400 mt-1">Admins, Vendors, Suppliers, Clerks</p>
                </div>

            </div>

            <!-- Secondary Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-400">
                    <p class="text-sm text-gray-500">Active Vendors</p>
                    <p class="text-3xl font-bold text-blue-500 mt-2">18</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-400">
                    <p class="text-sm text-gray-500">Active Suppliers</p>
                    <p class="text-3xl font-bold text-purple-500 mt-2">12</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-pink-400">
                    <p class="text-sm text-gray-500">Inventory Clerks</p>
                    <p class="text-3xl font-bold text-pink-500 mt-2">9</p>
                </div>

            </div>

            <!-- Alerts Banner -->
            <div class="bg-red-50 border border-red-200 rounded-xl p-6">
                <h4 class="font-semibold text-red-700">⚠ System Alerts</h4>
                <ul class="mt-3 space-y-2 text-sm text-red-600">
                    <li>• 23 products have already expired and need to be removed.</li>
                    <li>• 12 products expire within the next 7 days.</li>
                    <li>• 3 suppliers have not updated their stock in over 30 days.</li>
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>