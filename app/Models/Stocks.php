<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Stocks extends Model
{
    /** @use HasFactory<\Database\Factories\StocksFactory> */
    use HasFactory;
    protected $fillable = [
        'product_id',
        'clerk_id',
        'low_stock_threshold',
        'high_stock_threshold',
        'current_stock_level', 
        'status',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function clerk(): BelongsTo
    {
        return $this->belongsTo(User::class, 'clerk_id');
    }

    /**
     * The boot logic to intercept saves and write values physically to the DB
     */
    protected static function booted()
    {
        static::saving(function ($stock) {
            // 1. Calculate the physical stock level from the product's batches
            $totalStock = Batch::where('product_id', $stock->product_id)->sum('quantity') ?? 0;

            $stock->current_stock_level = $totalStock;

            // 2. Calculate and store the physical status string
            if ($totalStock <= 0) {
                $stock->status = 'No Stock';
            } elseif ($totalStock <= $stock->low_stock_threshold) {
                $stock->status = 'Low Stock';
            } elseif ($totalStock >= $stock->high_stock_threshold) {
                $stock->status = 'Overstocked';
            } else {
                $stock->status = 'In Stock';
            }
            
        });
    }
}
