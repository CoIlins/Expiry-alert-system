<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Stocks;

class Batch extends Model
{
    // Define custom primary key matching your schema
    protected $primaryKey = 'batch_id';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'product_id',        
        'clerk_id',          
        'quantity',          
        'total_price',        
        'manufacture_date',  
        'expiry_date',       
        'status',            
    ];
    protected $casts = [
    'manufacture_date' => 'date',
    'expiry_date'      => 'date',
];

    /**
     * Relationship: Batch belongs to a Product.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    /**
     * Relationship: Batch belongs to a User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'clerk_id', 'user_id');
    }


    protected static function booted()
    {
        // Whenever a batch quantity changes, update the parent stock row
        $syncStock = function ($batch) {
            $stock = Stocks::where('product_id', $batch->product_id)->first();
            if ($stock) {
                $stock->touch(); // Triggers the saving() event inside Stock model automatically
            }
        };

        static::saved($syncStock);
        static::deleted($syncStock);
    }
    public function getComputedStatusAttribute(): string
        {
        if (!$this->expiry_date) {
                    return 'active';
                }

                // Since it's casted to a date, it's already a clean Carbon object!
                $today = now()->startOfDay();
                $expiry = $this->expiry_date->copy()->startOfDay();
                
                if ($today->gt($expiry)) {
                    return 'expired';
                }

                // Look for a product-specific threshold, otherwise default to 7 days
                $thresholdDays = $this->product->alert_threshold_days ?? 7;
                $daysRemaining = $today->diffInDays($expiry, false);

                if ($daysRemaining <= $thresholdDays) {
                    return 'expiring_soon';
                }

                return 'active';
        }
}