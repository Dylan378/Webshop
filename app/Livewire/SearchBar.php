<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchBar extends Component
{
    public $query = '';
    public $products = [];

    public function updatedQuery()
    {
        if (strlen($this->query) > 2) {
            $this->products = Product::where('name', 'like', '%' . $this->query . '%')
                ->get()
                ->toArray();
        } else {
            $this->products = [];
        }
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
