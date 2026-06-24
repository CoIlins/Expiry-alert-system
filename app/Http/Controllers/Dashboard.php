<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class Dashboard extends Controller
{
   
public function clerkDashboard()
{
    // Fetch total row count strictly from the products table
    $totalProductsCount = Product::count();

    return view('clerk.dashboard', compact('totalProductsCount'));
}
}
