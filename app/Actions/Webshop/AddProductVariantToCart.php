<?php

namespace App\Actions\Webshop;

use App\Factories\CartFactory;
use App\Models\Cart;

class AddProductVariantToCart 
{
    public function add($variantId, $quantity = 1, $cart = null)
    {
        ($cart ?: CartFactory::make())->cartItems()->firstOrCreate([
            'product_variant' => $variantId,
        ], [
            'quantity' => 0,
        ])->increment('quantity', $quantity);
    }
}   

