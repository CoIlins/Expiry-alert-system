<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'unit_price',        
        'manufacture_date',  
        'expiry_date',       
        'status',            // active, expiring_soon, expired, returned
    ];

    /**
     * Relationship: Batch belongs to a Product.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    /**
     * Relationship: Batch belongs to a Clerk.
     */
    public function clerk(): BelongsTo
    {
        return $this->belongsTo(User::class, 'clerk_id', 'user_id');
    }
}