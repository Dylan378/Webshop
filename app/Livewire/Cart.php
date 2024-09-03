<?php

namespace App\Livewire;

use App\Actions\Webshop\CreateStripeCheckoutSession;
use App\Factories\CartFactory;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Cart extends Component
{
    use InteractsWithBanner;

    public function checkout(CreateStripeCheckoutSession $checkoutSession)
    {
        return $checkoutSession->createFromCart($this->cart);
    }
    
    public function getCartProperty()
    {
        return CartFactory::make();
    }

    public function getCartItemsProperty()
    {
        return $this->cart->cartItems;
    }

    public function increment($itemId)
    {
        $this->cart->cartItems()->find($itemId)?->increment('quantity');

        $this->dispatch('productAddedToCart');
    }

    public function decrement($itemId)
    {
        $item = $this->cart->cartItems()->find($itemId);

        $item->decrement('quantity');
        $this->dispatch('productRemovedFromCart');
        
        if($item->quantity < 1) {
            $item->delete($itemId);
            $this->warningBanner($item->product->name . ' has been deleted.');
        }
    }

    public function delete($itemId)
    {
        $item = $this->cart->cartItems()->find($itemId);

        $item->delete();

        $this->dispatch('productRemovedFromCart');
        $this->warningBanner($item->product->name . ' has been deleted.');
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
