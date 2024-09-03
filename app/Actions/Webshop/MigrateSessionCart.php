<?php

namespace App\Actions\Webshop;

use App\Models\Cart;

class MigrateSessionCart
{
    public function migrate(Cart $sessionCart, Cart $userCart)
    {
        $sessionCart->cartItems->each(fn($cartItem) => (new AddProductVariantToCart())->add(
            variantId: $cartItem->product_variant,
            quantity: $cartItem->quantity,
            cart: $userCart,
        ));

        $sessionCart->cartItems()->delete();
        $sessionCart->delete();
    }
}   

