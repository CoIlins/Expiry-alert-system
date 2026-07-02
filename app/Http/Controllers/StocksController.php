<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStocksRequest;
use App\Http\Requests\UpdateStocksRequest;
use App\Models\Stocks;
use App\Models\Product;
use Illuminate\Http\Request;

class StocksController extends Controller
{
public function index()
    {
        $stocks = Stocks::with(['product', 'clerk'])->get();
        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        // Only show products that don't have a stock monitor configuration set up yet
        $products = Product::whereNotIn('product_id', Stocks::pluck('product_id'))->get();
        return view('stocks.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,product_id|unique:stocks,product_id',
            'low_stock_threshold' => 'required|integer|min:0',
            'high_stock_threshold' => 'required|integer|gt:low_stock_threshold',
        ]);

        $validated['clerk_id'] = auth()->id();

        Stocks::create($validated);

        return redirect()->route('stocks.index')->with('success', 'Stock ledger configuration created.');
    }

    public function show(Stocks $stocks)
    {
        $stocks->load(['product.batches', 'clerk']);
        return view('stocks.show', compact('stocks'));
    }

    public function edit(Stocks $stocks)
    {
        return view('stocks.update', compact('stocks'));
    }

    public function update(Request $request, Stocks $stocks)
    {
        $validated = $request->validate([
            'low_stock_threshold' => 'required|integer|min:0',
            'high_stock_threshold' => 'required|integer|gt:low_stock_threshold',
        ]);

        $validated['clerk_id'] = auth()->id();

        $stocks->update($validated);

        return redirect()->route('stocks.index')->with('success', 'Stock thresholds modified.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stocks $stocks)
    {
        $stocks->delete();
        return redirect()->route('stocks.index')->with('success', 'Stock deleted successfully.');
    }
}
