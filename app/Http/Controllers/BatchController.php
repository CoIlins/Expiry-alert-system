<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBatchRequest;
use App\Http\Requests\UpdateBatchRequest;
use App\Models\Batch;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
        {
            $search = trim($request->input('search'));
            $query = Batch::with('product');

            if (!empty($search)) {
                $query->where(function($q) use ($search) {
                    // 1. Search by Product Name
                    $q->whereHas('product', function($productQuery) use ($search) {
                        $productQuery->where('product_name', 'like', "%{$search}%");
                    })
                    // 2. Search by Quantity
                    ->orWhere('quantity', 'like', "%{$search}%")
                    // 3. Search by Status (reads the raw date columns directly via text matches!)
                    ->orWhere('expiry_date', 'like', "%{$search}%")
                    ->orWhere('manufacture_date', 'like', "%{$search}%");
                });
            }

            $batches = $query->oldest('batch_id')->get();

            return view('batches.index', compact('batches'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::orderBy('product_name', 'asc')->get();
        // $statuses = [ 'active', 'expiring_soon', 'expired'];

        return view('batches.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBatchRequest $request)
    {
        // Validation rules for adding a batch
        // $request->validate([
        //     'product_id'        => 'required|exists:products,product_id',
        //     'quantity'          => 'required|integer|min:1',
        //     'manufacture_date'  => 'required|date',
        //     'expiry_date'       => 'required|date|after:manufacture_date',
        // ]);

        // Find parent product to get its standard price
$validated = $request->validated();

    // 2. Fetch the parent product to look up its current unit price
    $product = Product::findOrFail($validated['product_id']);

    // 3. Instantiate and safely map out your data payload properties
    $batch = new Batch();
    $batch->product_id        = $validated['product_id'];
    $batch->quantity          = $validated['quantity'];
    $batch->total_price       = $product->price * $validated['quantity']; 
    
    // Explicitly parse the incoming text strings into clean Carbon instances
    $batch->manufacture_date  = \Carbon\Carbon::parse($validated['manufacture_date']);
    $batch->expiry_date       = \Carbon\Carbon::parse($validated['expiry_date']);
    
    $batch->clerk_id          = auth()->user()->user_id; 
    
    $batch->save();

        return redirect()->route('batches.index')->with('success', 'Batch added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Batch $batch)
    {
        return view('batches.show', compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Batch $batch)
    {
        $products = Product::orderBy('product_name', 'asc')->get();
        $statuses = ['active', 'expiring_soon', 'expired'];

        return view('batches.edit', compact('batch', 'products', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBatchRequest $request, Batch $batch)
    {


                $product = Product::findOrFail($request->product_id);

                $batch->product_id = $request->product_id;
                $batch->quantity = $request->quantity;
                
                // Recalculate total price in case quantity or product changed
                $batch->total_price = $product->price * $request->quantity;
                
                $batch->manufacture_date = $request->manufacture_date;
                $batch->expiry_date = $request->expiry_date;
                // $batch->status = $request->status;
                $batch->save();

                return redirect()->route('batches.index')->with('success', 'Batch parameters updated successfully.');
            }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Batch $batch)
    {
        $batch->delete();
        return redirect()->route('batches.index')->with('success', 'Batch deleted successfully.');
    }
}
