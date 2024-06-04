<?php

namespace App\Livewire\Form;

use App\Models\Product;
use Livewire\Component;

class PurchaseProductForm extends Component
{
    public $productOptions;

    public $purchaseItems;

    public function mount()
    {
        $this->productOptions = Product::pluck('name', 'id');
        $this->purchaseItems = [];
    }

    public function addPurchaseItem()
    {
        $this->purchaseItems[] = [
            'product_id' => '',
            'quantity' => 0,
            'note' => '',
        ];
    }

    public function render()
    {
        return view('dashboard.components.shared.form.purchase-product-form');
    }
}
