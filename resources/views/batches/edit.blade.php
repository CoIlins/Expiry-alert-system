<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Edit batch details') }}</h2>
    </x-slot>

    <div class="py-4 max-w-xl mx-auto">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
            <form action="{{ route('batches.update', $batch->batch_id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Product Name</label>
                    <select name="product_id" class="w-full border-gray-300 rounded-lg text-sm focus:ring-indigo-500" required>
                        @foreach($products as $product)
                            <option value="{{ $product->product_id }}" {{ old('product_id', $batch->product_id) == $product->product_id ? 'selected' : '' }}>
                                {{ $product->product_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('product_id') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Quantity</label>
                    <input type="number" name="quantity" value="{{ old('quantity', $batch->quantity) }}" min="1" class="w-full border-gray-300 rounded-lg text-sm focus:ring-indigo-500" required>
                    @error('quantity') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Manufacture Date</label>
                        <input type="date" name="manufacture_date" value="{{ old('manufacture_date', $batch->manufacture_date ? $batch->manufacture_date->format('Y-m-d') : '') }}" class="w-full border-gray-300 rounded-lg text-sm focus:ring-indigo-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Expiry Date</label>
                        <input type="date" name="expiry_date" value="{{ old('expiry_date', $batch->expiry_date ? $batch->expiry_date->format('Y-m-d') : '') }}" class="w-full border-gray-300 rounded-lg text-sm focus:ring-indigo-500" required>
                    </div>
                </div>

                {{-- <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Status Mutation</label>
                    <select name="status" class="w-full border-gray-300 rounded-lg text-sm focus:ring-indigo-500" required>
                        @foreach($statuses as $status)
                            <option value="{{ $status }}" {{ old('status', $batch->status) == $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="pt-4 border-t border-gray-100 flex gap-2 justify-between">
                    <a href="{{ route('batches.index') }}" class="flex items-center gap-2 px-4 py-2 border rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-50">
                        <i data-lucide="arrow-left" class="w-4 h-4"> </i> Back
                    </a>
                    <button type="submit" class="flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-lg hover:bg-indigo-700">
                        <i data-lucide="send" class="w-4 h-4"> </i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>