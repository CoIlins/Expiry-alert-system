<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Batch;
use App\Models\Stock;
use Illuminate\Http\Request;

class StaffManagementController extends Controller
{
    public function index()
        {
            $vendor = auth()->user();

            $clerks = $vendor->clerks()
                ->orderBy('first_name', 'asc')
                ->get();

            return view('vendor.staff.index', compact('clerks'));
        }
    public function showLog($clerkId)
    {
        $vendor = auth()->user();

        // Security check: ensure this clerk belongs to the logged-in vendor
        $clerk = User::where('vendor_id', $vendor->user_id)->findOrFail($clerkId);

        // 1. Gather simplified Product logs
        $productLogs = Product::where('clerk_id', $clerk->user_id)->get()->map(function($item) {
            return (object)[
                'table'     => 'Products',
                'operation' => 'Created product ' . $item->product_name,
                'date'      => $item->created_at
            ];
        });

        // 2. Gather simplified Batch logs
        $batchLogs = Batch::where('clerk_id', $clerk->user_id)->with('product')->get()->map(function($item) {
            return (object)[
                'table'     => 'Batches',
                'operation' => 'Added batch for product ' . ($item->product->product_name ?? ''),
                'date'      => $item->created_at
            ];
        });

        // 3. Gather simplified Stock logs
        $stockLogs = Stock::where('clerk_id', $clerk->user_id)->with('product')->get()->map(function($item) {
            return (object)[
                'table'     => 'Stocks',
                'operation' => 'Updated stock levels for ' . ($item->product->product_name ?? ''),
                'date'      => $item->updated_at
            ];
        });

        // Merge everything and sort by the raw date (newest first)
        $allLogs = collect()
            ->concat($productLogs)
            ->concat($batchLogs)
            ->concat($stockLogs)
            ->sortByDesc('date');

        return view('vendor.staff.logs', compact('clerk', 'allLogs'));
        }
    }
