<?php

namespace App\Http\Controllers\Vendor;
use App\Models\Product;
use App\Models\Batch;
use App\Models\Stock;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorInventoryController extends Controller
{
    public function products()
    {
        $vendorId = auth()->id();

        // Get products where clerk_id matches, or products added by clerks of this vendor
        $products = Product::where('clerk_id', $vendorId)
            ->orWhereHas('clerk', function($query) use ($vendorId) {
                $query->where('vendor_id', $vendorId);
            })
            ->with('clerk') // Eager load the clerk who entered it
            ->latest()
            ->paginate(15);

        return view('vendor.inventory.products.index', compact('products'));
    }

    
    /**
     * View all inventory batches logged across the business.
     */
    public function batches()
    {
    $vendorId = auth()->id();

        // Fetch batches where the clerk who created it works for this vendor
        $batches = Batch::whereHas('user', function($query) use ($vendorId) {
                $query->where('vendor_id', $vendorId);
            })
            ->with(['product', 'user']) // Eager load product details and the clerk creator
            ->latest()
            ->paginate(15);

        return view('vendor.inventory.batches.index', compact('batches'));
    }

    /**
     * View the live aggregated stock floor levels.
     */
    public function stocks()
    {
        $vendorId = auth()->id();
    $stocks = Stock::whereHas('clerk', function($query) use ($vendorId) {
            $query->where('vendor_id', $vendorId);
        })
        ->orWhereHas('product.clerk', function($query) use ($vendorId) {
            // Safe backup fallback if a different clerk handles the product definition
            $query->where('vendor_id', $vendorId);
        })
        ->with(['product', 'clerk']) 
        ->latest()
        ->paginate(15);

    return view('vendor.inventory.stocks.index', compact('stocks'));
    }

        public function showProduct($productId)
    {
        $vendorId = auth()->id();

        // Security check: Find product belonging to this vendor or their clerk pool
        $product = Product::where(function($query) use ($vendorId) {
                $query->where('clerk_id', $vendorId)
                    ->orWhereHas('clerk', function($q) use ($vendorId) {
                        $q->where('vendor_id', $vendorId);
                    });
            })
            ->with(['batches', 'stock']) // Eager load nested relationships
            ->findOrFail($productId);

        // Reuse your existing detail layout file name here!
        return view('vendor.inventory.products.show', compact('product'));
    }
    public function showBatch($batchId)
    {
        $vendorId = auth()->id();

        // Fetch batch while strictly enforcing company-level isolation 
        $batch = Batch::whereHas('user', function($query) use ($vendorId) {
                $query->where('vendor_id', $vendorId);
            })
            ->with(['product', 'user'])
            ->findOrFail($batchId);

        return view('vendor.inventory.batches.show', compact('batch'));
    }
        public function showStock($stock)
    {
        $vendorId = auth()->id();

        $stocks = Stock::whereHas('clerk', function($query) use ($vendorId) {
                $query->where('vendor_id', $vendorId);
            })
            ->with(['product', 'clerk'])
            ->findOrFail($stock);

        return view('vendor.inventory.stocks.show', compact('stocks'));
    }
}
