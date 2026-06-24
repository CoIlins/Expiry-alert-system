<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Explicitly define the table name matching your database schema
    protected $table = 'products';

    // Specify the custom primary key column
    protected $primaryKey = 'product_id';

    /**
     * The attributes that are mass assignable.
     * Maps perfectly to your database registration fields.
     */
    protected $fillable = [
        'product_name',
        'category',
        'description'
    ];


    /**
     * RELATIONSHIP: A Product can have many tracking Batches.
     * Maps to PRODUCTS ||--o{ BATCHES
     */
    public function batches()
    {
        return $this->hasMany(Batch::class, 'product_id', 'product_id');
    }

    /**
     * RELATIONSHIP: A Product can trigger multiple Expiry Notifications.
     * Maps to PRODUCTS ||--o{ NOTIFICATIONS
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'product_id', 'product_id');
    }


    /**
     * RELATIONSHIP: A Product can qualify for various dynamic Vendor Markdown Discounts.
     * Maps to PRODUCTS ||--o{ DISCOUNTS
     */
    public function discounts()
    {
        return $this->hasMany(Discount::class, 'product_id', 'product_id');
    }

    /**
     * RELATIONSHIP: A Product can appear across multiple transaction Invoice Items.
     * Maps to PRODUCTS ||--o{ INVOICE_ITEMS
     */
    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItems::class, 'product_id', 'product_id');
    }

    /**
     * RELATIONSHIP: A Product can receive system-generated handling Recommendations.
     * Maps to PRODUCTS ||--o{ RECOMMENDATIONS
     */
    public function recommendations()
    {
        return $this->hasMany(Recommendation::class, 'product_id', 'product_id');
    }
}