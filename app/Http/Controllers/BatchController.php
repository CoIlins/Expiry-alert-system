<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBatchRequest;
use App\Http\Requests\UpdateBatchRequest;
use App\Models\Batch;
use App\Models\Product;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBatchRequest $request)
    {
        // Validation rules for adding a batch
        $request->validate([
            'product_id'        => 'required|exists:products,product_id',
            'quantity'          => 'required|integer|min:1',
            'manufacture_date'  => 'required|date',
            'expiry_date'       => 'required|date|after:manufacture_date',
            'status'            => 'required|in:active,expiring_soon,expired,returned',
        ]);

        // Find parent product to get its standard price
        $product = Product::findOrFail($request->product_id);

        $batch = new Batch();
        $batch->product_id       = $request->product_id;
        $batch->vendor_id        = auth()->user()->id ?? 1;
        $batch->quantity         = $request->quantity;

        // Automated Calculation: product.price x quantity = total_price
        $batch->total_price      = $product->price * $request->quantity;

        $batch->manufacture_date = $request->manufacture_date;
        $batch->expiry_date      = $request->expiry_date;
        $batch->status           = $request->status;
        $batch->save();

        return redirect()->route('batches.index')->with('success', 'Batch recorded with automated total price evaluation.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Batch $batch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBatchRequest $request, Batch $batch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Batch $batch)
    {
        //
    }
}
