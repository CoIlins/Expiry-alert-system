<aside class="w-64 bg-slate-900 text-slate-300 min-h-screen flex flex-col shadow-xl">

    <nav class="flex-1 px-2 py-2 space-y-4 overflow-y-auto">
        
        <div>
            @php
                $dashboardRoute = 'dashboard';
                if(Auth::user()->role_id == 1) $dashboardRoute = 'admin.dashboard';
                elseif(Auth::user()->role_id == 2) $dashboardRoute = 'vendor.dashboard';
                elseif(Auth::user()->role_id == 3) $dashboardRoute = 'clerk.dashboard';
            @endphp
                <a href="{{ route($dashboardRoute) }}" 
                   class="flex items-center px-3 py-1 text-sm font-semibold rounded-lg transition-all {{ request()->routeIs($dashboardRoute) ? 'bg-slate-800/60 text-indigo-400 font-semibold' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-100'}}">
                    Dashboard
                </a>
        </div>

        @if(Auth::user()->role_id == 3)
            <div class="space-y-1">
                
                <span class="px-2 text-sm font-bold text-indigo-500 uppercase tracking-wider block mb-2">Product Management</span>
                
                <a href="{{ route('products.index') }}" 
                   class="flex items-center px-3 py-2 text-sm font-semibold rounded-lg transition-all {{ request()->routeIs('products.index') ? 'bg-slate-800/60 text-indigo-400 font-semibold' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-100'}}">
                    View Products
                </a>
                
                <a href="{{ route('products.create') }}" 
                   class="flex items-center px-3 py-2 text-sm font-semibold rounded-lg transition-all {{ request()->routeIs('products.create') ? 'bg-slate-800/60 text-indigo-400 font-semibold' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-100' }}">
                    Add Product
                </a>
                
            
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
            </div>
        @endif

        @if(Auth::user()->role_id == 1)
            <div class="space-y-1">
                <span class="px-3 text-xs font-bold text-slate-500 uppercase tracking-wider block mb-2">🛡️ Administration</span>
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-slate-400 rounded-lg hover:bg-slate-800 hover:text-slate-100">
                    User Management
                </a>
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