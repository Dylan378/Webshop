<?php

namespace App\Livewire;

use App\Actions\Webshop\AddProductVariantToCart;
use App\Models\Product;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class ProductPage extends Component
{
    use InteractsWithBanner;
    public $productId;
    public $productVariant;

    public $rules = [
        'productVariant' => ['required', 'exists:App\Models\ProductVariant,id']
    ];

    public function mount()
    {
        $this->productVariant = $this->product->productVariants()->value('id');
    }

    public function addToCart(AddProductVariantToCart $cart)
    {
        $this->validate();

        $cart->add(
            variantId: $this->productVariant
        );

        $this->banner( $this->product->name.' has been added to your cart','style');

        $this->dispatch('productAddedToCart');
    }

    public function getProductProperty()
    {
        return Product::findOrFail($this->productId);
    }

    public function render()
    {
        return view('livewire.product-page');
    }
}
