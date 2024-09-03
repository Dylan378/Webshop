<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Oder extends Model
{
    use HasFactory;

    public $casts = [
        'billing_address' => 'collection',
        'billing_address' => 'collection',
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OderItem::class);
    }
}
