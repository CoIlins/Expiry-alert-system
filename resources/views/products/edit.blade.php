<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ __('Modify Product Profile') }}
        </h2>
    </x-slot>

    <div class="py-4 max-w-3xl mx-auto">
        @if($errors->any())
            <div class="mb-6 p-4 bg-rose-50 border-l-4 border-rose-500 text-rose-800 rounded-r-lg shadow-sm">
                <div class="font-semibold text-sm mb-1">⚠️ Verification Error Alert:</div>
                <ul class="list-disc pl-5 text-xs space-y-0.5 text-rose-700 font-mono">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 bg-slate-50 border-b border-slate-200">
                <h3 class="text-sm font-bold text-slate-700 uppercase tracking-wider">Update Target Product Attributes</h3>
            </div>

            <form action="{{ route('products.update', $product->product_id) }}" method="POST" class="p-6 space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label for="product_name" class="block text-sm font-semibold text-slate-700 mb-1.5">Product Identification Label Name</label>
                    <input type="text" id="product_name" name="product_name" value="{{ old('product_name', $product->product_name) }}" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                </div>

                <div>
                    <label for="category" class="block text-sm font-semibold text-slate-700 mb-1.5">Classification Department Category</label>
                    <input type="text" id="category" name="category" value="{{ old('category', $product->category) }}" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                </div>

                <div>
                    <label for="supplier_id" class="block text-sm font-semibold text-slate-700 mb-1.5">Origin Supply Chain Partner Entity</label>
                    <select id="supplier_id" name="supplier_id" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-white transition">
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->user_id }}" {{ old('supplier_id', $product->supplier_id) == $supplier->user_id ? 'selected' : '' }}>
                                {{ $supplier->business_name ?? ($supplier->first_name . ' ' . $supplier->last_name) }} (ID: {{ $supplier->user_id }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">Product Description / Specifications</label>
                    <textarea id="description" name="description" rows="4" placeholder="Enter full specifications, storage requirements, or handling instructions..." class="w-full px-3 py-2.5 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-white transition">{{ old('description', $product->description) }}</textarea>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center gap-3 justify-end">
                    <a href="{{ route('products.index') }}" class="px-4 py-2 bg-white border border-slate-300 text-slate-700 font-semibold text-xs uppercase tracking-wider rounded-lg hover:bg-slate-50 transition shadow-sm">
                        Cancel & Return
                    </a>
                    <button type="submit" class="px-4 py-2 bg-emerald-600 border border-transparent text-white font-semibold text-xs uppercase tracking-wider rounded-lg hover:bg-emerald-700 transition shadow-sm">
                        💾 Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>