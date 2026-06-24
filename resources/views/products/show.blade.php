<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <h2 class="font-semibold text-xl text-slate-800 leading-tight">
                Inspect: {{ $product->product_name }}
            </h2>
            <div class="flex items-center gap-2">
                <a href="{{ route('products.index') }}" class="px-3 py-1.5 bg-white border border-slate-300 text-slate-700 rounded-md text-sm hover:bg-slate-50 transition shadow-sm">
                    ⬅️ Grid Overview
                </a>
                <a href="{{ route('products.edit', $product->product_id) }}" class="px-3 py-1.5 bg-amber-500 text-white rounded-md text-sm hover:bg-amber-600 transition shadow-sm font-medium">
                    ✏️ Update Attributes
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-4 space-y-6">
        <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 bg-slate-50 border-b border-slate-200">
                <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Product System Index Profile Card</h3>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                <div class="space-y-3">
                    <div>
                        <span class="text-xs font-bold text-slate-400 uppercase block">Product Record Reference Key (PK)</span>
                        <span class="font-mono bg-slate-100 px-2 py-0.5 rounded text-xs text-slate-700 font-semibold border border-slate-200">PRD-{{ $product->product_id }}</span>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-slate-400 uppercase block">Product Profile Name</span>
                        <span class="text-slate-900 font-bold text-base">{{ $product->product_name }}</span>
                    </div>
                </div>
                <div class="space-y-3">
                    <div>
                        <span class="text-xs font-bold text-slate-400 uppercase block">Operational Classification Category</span>
                        <span class="text-slate-700 font-medium">{{ $product->category }}</span>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-slate-400 uppercase block">Linked Sourcing Pipeline Supplier Partner</span>
                        <span class="text-slate-700 font-medium">
                            {{ $product->supplier->business_name ?? ($product->supplier->first_name . ' ' . $product->supplier->last_name) }}
                        </span>
                        <span class="text-xs text-slate-400 font-mono block">Account User Entity ID: {{ $product->supplier_id }}</span>
                    </div>
                </div>
                
            </div>
        </div>

        
    </div>
</x-app-layout>