<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Clerk Activity Logs: {{ $clerk->first_name }} {{ $clerk->last_name }}
            </h2>

        </div>
    </x-slot>
    <div class=" max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead>
                    <tr class="bg-indigo-100 border-b border-gray-500 text-sm font-bold text-black uppercase tracking-wider">
                        <th class="px-6 py-4">Number</th>
                        <th class="px-6 py-4">Table</th>
                        <th class="px-6 py-4">Operation</th>
                        <th class="px-6 py-4">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm text-gray-700">

                    @forelse($allLogs as $log)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-4 py-4 text-center font-medium text-black-500 bg-gray-50/30 w-12">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 font-semibold">
                                <span class="px-2 py-0.5 text-sm rounded  bg-blue-50 text-black border border-blue-100">
                                    {{ $log->table }}
                                </span>
                            </td>
                            
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ $log->operation }}
                            </td>

                            <td class="px-6 py-4 text-black text-sm">
                                {{ $log->date->format('M d, Y ') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-12 text-center text-gray-400">
                                No clerk activity in products, batches and stock details.
                            </td>
                        </tr>
                    @endforelse
                    
                </tbody>

            </table>
            <div class="flex items-center justify-between border-t border-gray-200 bg-gray-50 px-6 py-4">
                <a href="{{ route('vendor.staff.index') }}" class="flex items-center font-semibold gap-2 px-4 py-2 rounded-lg border border-gray-300 bg-blue-600 text-sm font-medium text-white hover:bg-blue-700 transition shadow-sm">
                    <i data-lucide="circle-arrow-left" class="w-5 h-5"></i> Back
                </a>

                </div>
        </div>
    </div>
</x-app-layout>