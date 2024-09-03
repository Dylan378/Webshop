<?php

namespace App\Actions\Webshop;

use App\Models\Cart;
use App\Models\CartItems;
use Illuminate\Database\Eloquent\Collection;

class CreateStripeCheckoutSession
{
    public function createFromCart(Cart $cart)
    {   
        return $cart->user
            ->allowPromotionCodes()
            ->checkout(
                $this->formatCartItems($cart->cartItems), 
                [
                    'customer_update' => [
                        'shipping' => 'auto',
                    ],
                    'shipping_address_collection' => [
                        'allowed_countries' => [
                            'MX'
                        ]
                    ],
                    'metadata' => [
                        'user_id' => $cart->user->id,
                        'cart_id' => $cart->id,
                    ],
                ]
            );
    }

    private function formatCartItems(Collection $cartItems)
    {
        return $cartItems->map(function(CartItems $cartItem) {
            return [
                'price_data' => [
                    'currency' => 'MXN',
                    'unit_amount' => $cartItem->product->price->getAmount(),
                    'product_data' => [
                        'name' => $cartItem->product->name,
                        'description' => "Size: {$cartItem->productVariant->size} - Color: {$cartItem->productVariant->color}",
                        'metadata' => [
                            'product_id' => $cartItem->product->id,
                            'product_variant' => $cartItem->product_variant,
                        ]
                    ]
                ],
                'quantity' => 2,
            ];
        })->toArray();
    }
}   