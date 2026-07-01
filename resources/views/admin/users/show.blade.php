<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-4 max-w-2xl mx-auto">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="border-t border-gray-100">
                <dl class="divide-y divide-gray-100 text-sm">
                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Full Name</dt>
                        <dd class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0 text-black-600">
                            {{ $user->first_name }} {{ $user->last_name }}
                        </dd>
                    </div>

                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-200 bg-gray-200 transition">
                        <dt class="font-bold text-black-500">Email</dt>
                        <dd class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0 text-black-600">
                            {{ $user->email }}
                        </dd>
                    </div>

                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Role</dt>
                        <dd class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-indigo-50 text-indigo-700 border border-indigo-100">
                                {{ $user->role->role_name ?? 'No role' }}
                            </span>
                        </dd>
                    </div>

                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-200 bg-gray-200 transition">
                        <dt class="font-bold text-black-500">Business</dt>
                        <dd class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0 text-black-600">
                            {{ $user->business_name ?? 'N/A' }}
                        </dd>
                    </div>

                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-50/40 transition">
                        <dt class="font-bold text-black-500">Joined</dt>
                        <dd class="mt-1 text-gray-600 sm:col-span-2 sm:mt-0 whitespace-nowrap">
                            {{ $user->created_at ? $user->created_at->format('M d, Y \a\t H:i A') : 'N/A' }}
                        </dd>
                    </div>

                    <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 hover:bg-gray-200 bg-gray-200 transition">
                        <dt class="font-bold text-black-500">Last Updated</dt>
                        <dd class="mt-1 text-gray-600 sm:col-span-2 sm:mt-0 whitespace-nowrap">
                            {{ $user->updated_at ? $user->updated_at->format('M d, Y \a\t H:i A') : 'N/A' }}
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="bg-indigo-50 px-6 py-4 border-t border-gray-100 flex items-center gap-2 justify-between">
                <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-1.5 px-3 py-2 border border-gray-300 bg-white text-sm font-semibold text-gray-700 rounded-lg hover:bg-gray-50 transition shadow-sm">
                    <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i>
                    Back to users
                </a>

                @if($user->user_id !== Auth::id())
                    <form action="{{ route('admin.users.destroy', $user->user_id) }}" method="POST" class="inline m-0 p-0" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-2 bg-rose-500 text-white text-sm font-bold rounded-lg hover:bg-rose-600 transition shadow-sm">
                            <i data-lucide="trash-2" class="w-3.5 h-3.5 text-white"></i>
                            Delete User
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
