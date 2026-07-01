<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View My Clerks') }}
        </h2>
    </x-slot>

    <div class="py-1">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <table class="w-full text-left border-collapse whitespace-nowrap">
                    <thead>
                        <tr class="bg-indigo-100 border-b border-gray-500 text-sm font-semi-bold text-black-500 uppercase tracking-wider">
                            <th class="px-4 py-4 w-12 text-center">Number</th>
                            <th class="px-6 py-4">Clerk Name</th>
                            <th class="px-6 py-4">Email</th>
                            <th class="px-6 py-4 ">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                        @forelse($clerks as $clerk)
                            <tr class="hover:bg-gray-50/40 transition">
                                 <td class="px-4 py-4 text-center font-medium text-black-500 bg-gray-50/30 w-12">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4  text-black">
                                    {{ $clerk->first_name }} {{ $clerk->last_name }}
                                </td>
                                <td class="px-6 py-4  text-black text-sm">
                                    {{ $clerk->email }}
                                </td>
                                <td class="px-6 py-4 ">
                                    <a href="{{ route('vendor.staff.logs', $clerk->user_id) }}" 
                                       class="inline-flex items-center font-bold gap-1 px-3 py-1.5 bg-indigo-500 text-white rounded-lg text-sm hover:bg-indigo-700 ">
                                       <i data-lucide="user-round" class="w-5 h-5"></i>
                                        View Activity Logs
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-gray-400">
                                    No clerks have self-registered to your business account via your Business Name yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>