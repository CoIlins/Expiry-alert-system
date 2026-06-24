<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Expiry Alert System') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50">

    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b border-indigo-100">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-start">
            <h1 class="text-2xl font-bold text-indigo-600">
                {{ config('app.name', 'Expiry Alert System') }}
            </h1>
            <div class="space-x-3">
                <a href="{{ route('login') }}"
                   class="px-5 py-2 text-indigo-600 border border-indigo-600 rounded-lg hover:bg-indigo-50 transition">
                    Login
                </a>
                <a href="{{ route('register') }}"
                   class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    Register
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-indigo-50 py-20">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-start">

            <div>
                <h1 class="text-5xl font-extrabold text-gray-900 leading-tight">
                    Smart Expiry Alert System
                    </h1>
                    <h1 class="text-5xl font-extrabold text-gray-900 leading-tight">
                    <span class="text-indigo-600">Made for Businesses</span>
                </h1>
                <p class="mt-6 text-lg text-gray-600">
                    A centralized platform that enables vendors to track expiry details, receive notifications and recommendations on time
                </p>
                <div class="mt-8 flex gap-4">
                    <a href="{{ route('register') }}"
                       class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                        Get Started
                    </a>
                    <a href="{{ route('login') }}"
                       class="px-6 py-3 border border-indigo-400 rounded-lg hover:bg-indigo-50 transition">
                        Login
                    </a>
                </div>
            </div>

            <div>
                <div class="bg-white shadow-md rounded-lg p-6 border border-indigo-100">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">Key Features</h2>
                    <div class="space-y-4">
                        @foreach ([
                            ['icon'=>'calendar-clock', 'text'=>'Automated expiry date tracking'],
                            ['icon'=>'bell-ring', 'text'=>'Real-time alerts for expiring products'],
                            ['icon'=>'shield-check', 'text'=>'Role-based access control'],
                            ['icon'=>'boxes', 'text'=>'Inventory management and tracking'],
                            ['icon'=>'chart-column', 'text'=>'Expiry analytics and reporting'],
                            ['icon'=>'truck', 'text'=>'Vendor and inventory clerk collaboration'],
                        ] as $feature)

                        <div class="flex items-center">
                            <i data-lucide="{{ $feature['icon'] }}" 
                            class="w-4 h-6 text-indigo-600 mr-3">
                            </i>

                            <span>{{ $feature['text'] }}</span>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Stakeholder Roles Section -->
    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Built for Every Stakeholder</h2>
            <div class="grid md:grid-cols-3 gap-4">
                @foreach ([
                    
                    ['Vendor',          'Track product expiry details and receive expiry recommendations.'],
                    ['Inventory Clerk', 'Input product and batch details.'],
                    ['Admin',           'Manage user accounts'],
                ] as [$role, $desc])
                    <div class="bg-indigo-100 p-6 rounded-xl shadow-sm">
                        <h3 class="font-bold text-lg text-black-600">{{ $role }}</h3>
                        <p class="mt-3 text-gray-600">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('layouts.footer')
        <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        lucide.createIcons();
    </script>

</body>
</html>