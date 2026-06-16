<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Expiry Tracking System') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-indigo-600">
                {{ config('app.name', 'Expiry Tracking System') }}
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
    <section class="max-w-7xl mx-auto px-6 py-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">

            <div>
                <h1 class="text-5xl font-extrabold text-gray-900 leading-tight">
                    Smart Expiry Tracking
                    <span class="text-indigo-600">for Modern Businesses</span>
                </h1>
                <p class="mt-6 text-lg text-gray-600">
                    Monitor product expiry dates, reduce wastage, receive intelligent alerts,
                    and manage inventory efficiently through one centralized platform.
                </p>
                <div class="mt-8 flex gap-4">
                    <a href="{{ route('register') }}"
                       class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                        Get Started
                    </a>
                    <a href="{{ route('login') }}"
                       class="px-6 py-3 border border-gray-400 rounded-lg hover:bg-gray-100 transition">
                        Login
                    </a>
                </div>
            </div>

            <div>
                <div class="bg-white shadow-xl rounded-2xl p-8">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">Key Features</h2>
                    <div class="space-y-4">
                        @foreach ([
                            'Automated expiry date monitoring',
                            'Real-time alerts for expiring products',
                            'Role-based access control',
                            'Inventory management and tracking',
                            'Expiry analytics and reporting',
                            'Supplier and vendor collaboration',
                        ] as $feature)
                            <div class="flex items-start">
                                <span class="text-green-600 text-xl mr-3">✓</span>
                                <span>{{ $feature }}</span>
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
            <div class="grid md:grid-cols-4 gap-6">
                @foreach ([
                    ['Admin',           'Manage users, roles, reports, and system-wide operations.'],
                    ['Vendor',          'Track products and receive expiry recommendations.'],
                    ['Supplier',        'Monitor supplied goods and expiry performance.'],
                    ['Inventory Clerk', 'Record stock entries and update expiry information.'],
                ] as [$role, $desc])
                    <div class="bg-gray-50 p-6 rounded-xl shadow-sm">
                        <h3 class="font-bold text-lg text-indigo-600">{{ $role }}</h3>
                        <p class="mt-3 text-gray-600">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('layouts.footer')

</body>
</html>