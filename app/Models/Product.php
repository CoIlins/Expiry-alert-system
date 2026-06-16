<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
    protected $fillable = [
        'user_id', 'name', 'category',
        'quantity', 'expiry_date', 'batch_number',
    ];

    protected $casts = [
        'expiry_date' => 'date',
    ];

    // Relationships
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Scopes — reusable query filters
    public function scopeExpired($query)
    {
        return $query->where('expiry_date', '<', Carbon::today());
    }

    public function scopeExpiringSoon($query, $days = 30)
    {
        return $query->whereBetween('expiry_date', [
            Carbon::today(),
            Carbon::today()->addDays($days),
        ]);
    }

    public function scopeValid($query)
    {
        return $query->where('expiry_date', '>=', Carbon::today());
    }
}