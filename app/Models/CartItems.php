<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class CartItems extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_variant',
        'quantity'
    ];

    protected function subtotal(): Attribute
    {
        return Attribute::make(
            get: function() {
                return $this->product->price->multiply($this->quantity);
            }
        );
    }

    public function product(): HasOneThrough
    {
        return $this->hasOneThrough(
            Product::class, 
            ProductVariant::class, 
           'id',
           'id',
           'product_variant',
           'product_id',
        );
    }

    public function productVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant');
    }
}
