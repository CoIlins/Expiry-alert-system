<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Report;
use App\Models\Batch;
use App\Models\Product;


class ReportController extends Controller
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
    public function store(StoreReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }


    public function inventoryReport()
    {
        $batches = Batch::with(['product', 'user'])->get();

        // Calculate macro numbers for the dashboard cards
        $totalInventoryValue = $batches->sum('total_price');
        $totalItems = $batches->sum('quantity');
        
        $expiredCount = $batches->filter(fn($b) => $b->computed_status === 'expired')->count();
        $expiringSoonCount = $batches->filter(fn($b) => $b->computed_status === 'expiring_soon')->count();

        return view('reports.inventory', compact(
            'batches',
            'totalInventoryValue',
            'totalItems',
            'expiredCount',
            'expiringSoonCount'
        ));
    }

}
