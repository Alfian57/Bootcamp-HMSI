<?php

namespace App\Livewire\Modals\Product;

use Livewire\Component;

class DeleteProductModal extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function delete()
    {
        $this->product->delete();

        toast(__('dashboard/products.delete.success-message'), 'success');
        $this->redirect(route('dashboard.products.index'));
    }

    public function render()
    {
        return view('dashboard.components.livewire.modals.product.delete-product-modal');
    }
}
