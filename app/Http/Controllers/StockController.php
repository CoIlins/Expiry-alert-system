<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Stock::with(['product', 'clerk']);


        if (!empty($search)) {
            $query->where(function ($q) use ($search) {

                $q->whereHas('product', function ($productQuery) use ($search) {
                    $productQuery->where('product_name', 'like', "%{$search}%");
                })
                ->orWhere('status', 'like', "%{$search}%")
            
                ->orWhere('current_stock_level', 'like', "%{$search}%");
            });
        }

        $stocks = $query->get();
        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        // Only show products that don't have a stock monitor configuration set up yet
        $products = Product::whereNotIn('product_id', Stock::pluck('product_id'))->get();
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

        Stock::create($validated);

        return redirect()->route('stocks.index')->with('success', 'Stock ledger configuration created.');
    }

    public function show(Stock $stock)
    {
        $stock->load(['product.batches', 'clerk']);
        return view('stocks.show', compact('stock'));
    }

    public function edit(Stock $stock)
    {
        $stock->load('product');

        $products = Product::orderBy('product_name', 'asc')->get();

        return view('stocks.edit', compact('stock', 'products'));
    }

    public function update(UpdateStockRequest $request, Stock $stock)
    {
        $validated = $request->validated();
        $validated['clerk_id'] = auth()->id();

        // Automatically recalculates stock_level & status inside Stock's static::saving() lifecycle event
        $stock->update($validated);

        return redirect()->route('stocks.index')->with('success', 'Stock thresholds updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        // $stocks->delete();
        // return redirect()->route('stocks.index')->with('success', 'Stock deleted successfully.');
    }
}
