<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource with searching and pagination.
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search'));

        $query = Product::query();

        if ($request->has('search') && !empty($search)) {
            // Validate search query to be safe alphanumeric with spaces
            $request->validate([
                'search' => 'nullable|string|regex:/^[a-zA-Z0-9\s\-]+$/',
            ]);

            $query->where(function($q) use ($search) {
                $q->where('product_name', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        // Paginate results matching your exact specification (10 items per page)
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category'     => 'required|string|max:100',
            'price'        => 'required|numeric|min:0',
        ]);

        $product = new Product();

        $product->product_name = $request->product_name;
        $product->category     = $request->category;
        $product->price        = $request->price;
        $product->clerk_id     = Auth::user()->user_id;

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }


    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category'     => 'required|string|max:100',
            'price'        => 'required|numeric|min:0',
        ]);

        $product->product_name = $request->product_name;
        $product->category     = $request->category;
        $product->price        = $request->price;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}