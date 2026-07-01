<aside class="w-64 bg-slate-900 text-slate-300 min-h-screen flex flex-col shadow-xl">
    <div class="h-16 flex items-center px-6 border-b border-slate-800 bg-slate-950">
        <span class="text-lg font-bold text-indigo-400 tracking-wide flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-indigo-500"></span>
            {{ config('app.name', 'Expiry Alert') }}
        </span>
    </div>

    <nav class="flex-1 px-4 py-6 space-y-6 overflow-y-auto">
        
        <div>
            @php
                $dashboardRoute = 'dashboard';
                if(Auth::user()->role_id == 1) $dashboardRoute = 'admin.dashboard';
                elseif(Auth::user()->role_id == 2) $dashboardRoute = 'vendor.dashboard';
                elseif(Auth::user()->role_id == 3) $dashboardRoute = 'clerk.dashboard';
            @endphp
            <a href="{{ route($dashboardRoute) }}" 
               class="flex items-center px-3 py-2 text-sm font-semibold rounded-lg transition-all {{ request()->routeIs('*.dashboard') || request()->routeIs('dashboard') ? 'bg-indigo-600 text-white font-bold' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                <span class="mr-3 text-base">📊</span>
                Dashboard
            </a>
        </div>

        @if(Auth::user()->role_id == 3)
            <div class="space-y-1">
                <span class="px-3 text-xs font-bold text-slate-500 uppercase tracking-wider block mb-2">📦 Product Management</span>
                
                <a href="{{ route('products.index') }}" 
                   class="flex items-center px-3 py-2 text-sm font-semibold rounded-lg transition-all {{ request()->routeIs('products.index') ? 'bg-slate-800 text-indigo-400 font-bold border-l-4 border-indigo-500 pl-2' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-100' }}">
                    All Products
                </a>
                
                <a href="{{ route('products.create') }}" 
                   class="flex items-center px-3 py-2 text-sm font-semibold rounded-lg transition-all {{ request()->routeIs('products.create') ? 'bg-slate-800 text-indigo-400 font-bold border-l-4 border-indigo-500 pl-2' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-100' }}">
                    Add Product
                </a>
<<<<<<< Updated upstream
=======
                
            
                <span class="px-2 text-sm font-bold text-indigo-500 uppercase tracking-wider block mb-2">Batch Management
                
                </span>
                <a href="{{ route('batches.index') }}" 
                   class="flex items-center px-3 py-2 text-sm font-semibold rounded-lg transition-all {{ request()->routeIs('batches.index') ? 'bg-slate-800/60 text-indigo-400 font-semibold' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-100' }}">
                    View Batches
                </a>
                
                <a href="{{ route('batches.create') }}" 
                   class="flex items-center px-3 py-2 text-sm font-semibold rounded-lg transition-all {{ request()->routeIs('batches.create') ? 'bg-slate-800/60 text-indigo-400 font-semibold' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-100' }}">
                    Add Batch
                </a>


                <span class="px-2 text-sm font-bold text-indigo-500 uppercase tracking-wider block mb-2">Stock Management

                </span>
                <a href="{{ route('stocks.index') }}" 
                   class="flex items-center px-3 py-2 text-sm font-semibold rounded-lg transition-all {{ request()->routeIs('stocks.index') ? 'bg-slate-800/60 text-indigo-400 font-semibold' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-100' }}">
                    View Stocks
                </a>
                
                <a href="{{ route('stocks.create') }}" 
                   class="flex items-center px-3 py-2 text-sm font-semibold rounded-lg transition-all {{ request()->routeIs('stocks.create') ? 'bg-slate-800/60 text-indigo-400 font-semibold' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-100' }}">
                    Add Stock Thresholds
                </a>
                <span class="px-3 text-sm font-bold text-indigo-500 uppercase tracking-wider block mb-2">Reports
                
                </span>
                <a href="{{ route('reports.inventory') }}" 
                   class="flex items-center px-3 py-2 text-sm font-semibold rounded-lg transition-all {{ request()->routeIs('reports.inventory') ? 'bg-slate-800/60 text-indigo-400 font-semibold' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-100' }}">
                    Inventory report
                </a>
                
>>>>>>> Stashed changes
            </div>
        @endif

        @if(Auth::user()->role_id == 1)
            <div class="space-y-1">
                <span class="px-2 text-sm font-bold text-indigo-500 uppercase tracking-wider block mb-2">Administration</span>

                <a href="{{ route('profile.edit') }}"
                   class="flex items-center px-3 py-2 text-sm font-semibold rounded-lg transition-all {{ request()->routeIs('profile.edit') ? 'bg-slate-800/60 text-indigo-400 font-semibold' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-100' }}">
                    Profile Settings
                </a>

                <a href="{{ route('admin.users.index') }}"
                   class="flex items-center px-3 py-2 text-sm font-semibold rounded-lg transition-all {{ request()->routeIs('admin.users.index') ? 'bg-slate-800/60 text-indigo-400 font-semibold' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-100' }}">
                    User Management
                </a>
            </div>
            <div class="space-y-1">
                <span class="px-2 text-sm font-bold text-indigo-500 uppercase tracking-wider block mb-2">Inventory</span>

                <span title="Inventory routes are currently assigned to inventory clerks"
                      class="flex items-center px-3 py-2 text-sm font-semibold rounded-lg text-slate-600 cursor-not-allowed">
                    View Reports
                </span>
            </div>
        @endif

    </nav>

    <div class="p-4 border-t border-slate-800 bg-slate-950 text-sm">
        <div class="font-semibold text-slate-300 truncate">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
        <div class="text-xs text-slate-500 font-mono mt-0.5 uppercase tracking-wider text-[10px]">
            @if(Auth::user()->role_id == 1) Admin
            @elseif(Auth::user()->role_id == 2) Vendor

            @elseif(Auth::user()->role_id == 3) Inventory Clerk
            @endif
        </div>
    </div>
</aside>
