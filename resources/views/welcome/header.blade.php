<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <h1 class="text-2xl font-bold text-indigo-600">
            {{ config('app.name', 'Expiry Tracking System') }}
        </h1>

        <div class="space-x-3">

            @auth
                <a href="{{ url('/dashboard') }}"
                   class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="px-5 py-2 text-indigo-600 border border-indigo-600 rounded-lg hover:bg-indigo-50 transition">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    Register
                </a>
            @endauth

        </div>
    </div>
</nav>


