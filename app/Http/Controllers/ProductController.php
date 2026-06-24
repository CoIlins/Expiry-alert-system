<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // index.blade.php (Retrieve all records cleanly)
    public function index(Request $request)
    {
        // Eager-load 'supplier' across both branches to prevent database overhead performance drops
        if ($request->filled('search') || $request->filled('category')) {
            $query = Product::query();
            if ($request->filled('search')) {
                $query->where('product_name', 'like', '%' . $request->search . '%');
            }
            if ($request->filled('category')) {
                $query->where('category', $request->category);
            }
            // Ensure batches relationship count is also loaded for index rendering metrics
            $products = $query->with(['supplier', 'batches'])->get();
        } else {
            $products = Product::with(['supplier', 'batches'])->get();
        }
        return view('products.index', compact('products'));
    }

    // create.blade.php
    public function create()
    {
        // Role 3 = Supplier context
        // $suppliers = User::where('role_id', 3)->get();
        // return view('products.create', compact('suppliers'));
    }

    // Handles form submission (Insert new record)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'category'     => 'required|string|max:255',
            'supplier_id'  => 'required|exists:users,user_id', // Ensures valid linked supplier account
                        // Added validation rule
        ]);

        Product::create([
            'product_name' => $validated['product_name'],
            'category'     => $validated['category'],
            'supplier_id'  => $validated['supplier_id'],
                  // Injected into tracking arrays
        ]);

        return redirect()->route('products.index')->with('success', 'Product catalog entry created successfully.');
    }

    // show.blade.php (Retrieve one record by ID)
    public function show($id)
    {
        // Use findOrFail to drop standard 404 views cleanly if bad URLs are keyed manually
        $product = Product::findOrFail($id);
        $product->load(['batches', 'supplier']);
        
        return view('products.show', compact('product'));
    }

    // edit.blade.php (Retrieve record by ID for editing)
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    // Handles modification processing (Update existing record)
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'category'     => 'required|string|max:255',
            'supplier_id'  => 'required|exists:users,user_id',
                
        ]);

        $product = Product::findOrFail($id);
        
        $product->update([
            'product_name' => $validated['product_name'],
            'category'     => $validated['category'],
            'supplier_id'  => $validated['supplier_id'],
                
        ]);

        return redirect()->route('products.index')->with('success', 'Product profile updated successfully.');
    }

    // Handles row removal (Delete a record)
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product tracking profile cleared out.');
    }
}