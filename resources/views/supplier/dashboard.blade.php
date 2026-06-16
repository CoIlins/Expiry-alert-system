<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Supplier Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Welcome -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800">Welcome, {{ Auth::user()->name }} 👋</h3>
                <p class="text-gray-500 mt-1">Track the performance and expiry status of goods you've supplied.</p>
            </div>

            <!-- Stat Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-indigo-500">
                    <p class="text-sm text-gray-500">Total Goods Supplied</p>
                    <p class="text-4xl font-bold text-gray-800 mt-2">430</p>
                    <p class="text-xs text-gray-400 mt-1">All time</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
                    <p class="text-sm text-gray-500">Still Valid</p>
                    <p class="text-4xl font-bold text-green-600 mt-2">398</p>
                    <p class="text-xs text-gray-400 mt-1">In good standing</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-400">
                    <p class="text-sm text-gray-500">Expiring Soon</p>
                    <p class="text-4xl font-bold text-yellow-500 mt-2">24</p>
                    <p class="text-xs text-gray-400 mt-1">Within 30 days</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-red-500">
                    <p class="text-sm text-gray-500">Expired Goods</p>
                    <p class="text-4xl font-bold text-red-500 mt-2">8</p>
                    <p class="text-xs text-gray-400 mt-1">Past expiry date</p>
                </div>

            </div>

            <!-- Secondary Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
                    <p class="text-sm text-gray-500">Compliance Rate</p>
                    <p class="text-3xl font-bold text-green-600 mt-2">92.6%</p>
                    <p class="text-xs text-gray-400 mt-1">Goods still within expiry</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-400">
                    <p class="text-sm text-gray-500">Vendors Supplied</p>
                    <p class="text-3xl font-bold text-blue-500 mt-2">11</p>
                    <p class="text-xs text-gray-400 mt-1">Active partnerships</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-orange-400">
                    <p class="text-sm text-gray-500">Batches This Month</p>
                    <p class="text-3xl font-bold text-orange-500 mt-2">34</p>
                    <p class="text-xs text-gray-400 mt-1">Deliveries in {{ now()->format('F') }}</p>
                </div>

            </div>

            <!-- Info Banner -->
            <div class="bg-green-50 border border-green-200 rounded-xl p-6">
                <h4 class="font-semibold text-green-700">✓ Performance Summary</h4>
                <ul class="mt-3 space-y-2 text-sm text-green-700">
                    <li>• Your compliance rate of 92.6% is above the platform average of 88%.</li>
                    <li>• 8 expired goods have been flagged — coordinate with vendors for returns.</li>
                    <li>• 24 items expiring soon — consider prioritizing these in next deliveries.</li>
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>