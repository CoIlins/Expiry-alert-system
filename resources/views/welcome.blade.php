
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expiry Tracking System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <div>
                <h1 class="text-2xl font-bold text-indigo-600">
                    Expiry Tracking System
                </h1>
            </div>

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

            <!-- Left Side -->
            <div>

                <h1 class="text-5xl font-extrabold text-gray-900 leading-tight">
                    Smart Expiry Tracking
                    <span class="text-indigo-600">
                        for Modern Businesses
                    </span>
                </h1>

                <p class="mt-6 text-lg text-gray-600">
                    Monitor product expiry dates, reduce wastage,
                    receive intelligent alerts, and manage inventory
                    efficiently through one centralized platform.
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

            <!-- Right Side -->
            <div>

                <div class="bg-white shadow-xl rounded-2xl p-8">

                    <h2 class="text-2xl font-bold mb-6 text-gray-800">
                        Key Features
                    </h2>

                    <div class="space-y-4">

                        <div class="flex items-start">
                            <span class="text-green-600 text-xl mr-3">✓</span>
                            <span>Automated expiry date monitoring</span>
                        </div>

                        <div class="flex items-start">
                            <span class="text-green-600 text-xl mr-3">✓</span>
                            <span>Real-time alerts for expiring products</span>
                        </div>

                        <div class="flex items-start">
                            <span class="text-green-600 text-xl mr-3">✓</span>
                            <span>Role-based access control</span>
                        </div>

                        <div class="flex items-start">
                            <span class="text-green-600 text-xl mr-3">✓</span>
                            <span>Inventory management and tracking</span>
                        </div>

                        <div class="flex items-start">
                            <span class="text-green-600 text-xl mr-3">✓</span>
                            <span>Expiry analytics and reporting</span>
                        </div>

                        <div class="flex items-start">
                            <span class="text-green-600 text-xl mr-3">✓</span>
                            <span>Supplier and vendor collaboration</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- User Roles Section -->
    <section class="bg-white py-20">

        <div class="max-w-7xl mx-auto px-6">

            <h2 class="text-3xl font-bold text-center mb-12">
                Built for Every Stakeholder
            </h2>

            <div class="grid md:grid-cols-4 gap-6">

                <div class="bg-gray-50 p-6 rounded-xl shadow-sm">
                    <h3 class="font-bold text-lg text-indigo-600">
                        Admin
                    </h3>
                    <p class="mt-3 text-gray-600">
                        Manage users, roles, reports, and system-wide operations.
                    </p>
                </div>

                <div class="bg-gray-50 p-6 rounded-xl shadow-sm">
                    <h3 class="font-bold text-lg text-indigo-600">
                        Vendor
                    </h3>
                    <p class="mt-3 text-gray-600">
                        Track products and receive expiry recommendations.
                    </p>
                </div>

                <div class="bg-gray-50 p-6 rounded-xl shadow-sm">
                    <h3 class="font-bold text-lg text-indigo-600">
                        Supplier
                    </h3>
                    <p class="mt-3 text-gray-600">
                        Monitor supplied goods and expiry performance.
                    </p>
                </div>

                <div class="bg-gray-50 p-6 rounded-xl shadow-sm">
                    <h3 class="font-bold text-lg text-indigo-600">
                        Inventory Clerk
                    </h3>
                    <p class="mt-3 text-gray-600">
                        Record stock entries and update expiry information.
                    </p>
                </div>

            </div>

        </div>

    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-6">

        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">

            <div>
                © {{ date('Y') }} Expiry Tracking System
            </div>

            <div>
                Reduce Waste • Improve Inventory Control
            </div>

        </div>

    </footer>

</body>
</html>
```
