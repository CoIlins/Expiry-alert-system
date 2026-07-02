<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return match ($user->role->role_name) {
            'Admin' => redirect()->route('admin.dashboard'),
            'Vendor' => redirect()->route('vendor.dashboard'),
            'Inventory Clerk' => redirect()->route('clerk.dashboard'),
            default => redirect('/'),
        };
    }

    public function adminDashboard()
    {
        $today = now()->toDateString();
        $soon = now()->addDays(30)->toDateString();
        $nextWeek = now()->addDays(7)->toDateString();

        $totalProductsCount = Product::count();
        $expiringSoonCount = Batch::whereBetween('expiry_date', [$today, $soon])
            ->distinct('product_id')
            ->count('product_id');
        $expiredProductsCount = Batch::whereDate('expiry_date', '<', $today)
            ->distinct('product_id')
            ->count('product_id');
        $totalUsersCount = User::count();
        $activeVendorsCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'Vendor');
        })->count();
        $inventoryClerksCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'Inventory Clerk');
        })->count();
        $expiringThisWeekCount = Batch::whereBetween('expiry_date', [$today, $nextWeek])
            ->distinct('product_id')
            ->count('product_id');

        return view('admin.dashboard', compact(
            'totalProductsCount',
            'expiringSoonCount',
            'expiredProductsCount',
            'totalUsersCount',
            'activeVendorsCount',
            'inventoryClerksCount',
            'expiringThisWeekCount'
        ));
    }
    

    public function clerkDashboard()
    {
        $totalProductsCount = Product::count();

        return view('clerk.dashboard', compact('totalProductsCount'));
    }
}
