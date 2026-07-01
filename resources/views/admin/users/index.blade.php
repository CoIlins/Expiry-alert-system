<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User Management') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-4 space-y-6">
        @if(session('success'))
            <div class="p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 rounded-r-lg shadow-sm flex items-center justify-between" id="status-alert">
                <span class="text-sm font-medium">{{ session('success') }}</span>
                <button onclick="document.getElementById('status-alert').remove()" class="text-emerald-400 hover:text-emerald-600 transition text-lg font-bold leading-none">
                    &times;
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="p-4 bg-rose-50 border-l-4 border-rose-500 text-rose-800 rounded-r-lg shadow-sm flex items-center justify-between" id="error-alert">
                <span class="text-sm font-medium">{{ session('error') }}</span>
                <button onclick="document.getElementById('error-alert').remove()" class="text-rose-400 hover:text-rose-600 transition text-lg font-bold leading-none">
                    &times;
                </button>
            </div>
        @endif

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-4">
            <form action="{{ route('admin.users.index') }}" method="GET" class="flex flex-col md:flex-row gap-3 items-stretch md:items-center justify-between">
                <div class="relative flex-1 max-w-xl">
                    <input type="text" name="search" value="{{ $search }}" placeholder="Search users" class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                </div>

                <div class="flex flex-wrap items-center gap-2 justify-end">
                    <button type="submit" class="flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-lg hover:bg-indigo-700 transition shadow-sm">
                        <i data-lucide="search" class="w-4 h-4"></i>
                        Search
                    </button>

                    <a href="{{ route('admin.users.index') }}" class="flex items-center gap-2 px-4 py-2 bg-slate-600 text-white text-sm font-semibold rounded-lg hover:bg-slate-700 transition shadow-sm">
                        <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                        Clear
                    </a>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/70">
                <h3 class="text-base font-bold text-gray-700">All Users</h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <th class="px-4 py-4 w-12 text-center">Number</th>
                            <th class="px-6 py-4">Name</th>
                            <th class="px-6 py-4">Email</th>
                            <th class="px-6 py-4">Role</th>
                            <th class="px-6 py-4">Business</th>
                            <th class="px-6 py-4">Joined</th>
                            <th class="px-6 py-4 text-center w-28">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50/80 transition-all">
                                <td class="px-4 py-4 text-center font-medium text-gray-500 bg-gray-50/30">
                                    {{ $users->firstItem() + $loop->index }}
                                </td>

                                <td class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                                    {{ $user->first_name }} {{ $user->last_name }}
                                </td>

                                <td class="px-6 py-4 text-gray-700">
                                    {{ $user->email }}
                                </td>

                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-indigo-50 text-indigo-700 border border-indigo-100">
                                        {{ $user->role->role_name ?? 'No role' }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-gray-700">
                                    {{ $user->business_name ?? 'N/A' }}
                                </td>

                                <td class="px-6 py-4 text-gray-500 text-xs font-mono whitespace-nowrap">
                                    {{ $user->created_at ? $user->created_at->format('M d, Y') : 'N/A' }}
                                </td>

                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <div class="inline-flex items-center justify-center gap-1">
                                        <a href="{{ route('admin.users.show', $user->user_id) }}"
                                           class="p-2 bg-indigo-50 text-indigo-600 border border-indigo-200 rounded hover:bg-indigo-100 transition shadow-sm"
                                           title="View User">
                                            <i data-lucide="binoculars" class="w-4 h-4"></i>
                                        </a>

                                        @if($user->user_id !== Auth::id())
                                            <form action="{{ route('admin.users.destroy', $user->user_id) }}" method="POST" class="inline m-0 p-0" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="p-2 bg-rose-50 text-rose-600 border border-rose-200 rounded hover:bg-rose-100 transition shadow-sm"
                                                        title="Delete User">
                                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                </button>
                                            </form>
                                        @else
                                            <button type="button"
                                                    class="p-2 bg-gray-300 text-gray-500 rounded cursor-not-allowed"
                                                    title="You cannot delete your own account"
                                                    disabled>
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-gray-500 font-medium bg-gray-50/50">
                                    No users found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
