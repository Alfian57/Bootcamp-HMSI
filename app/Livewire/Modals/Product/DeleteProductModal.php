<?php

namespace App\Livewire\Modals\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class DeleteProductModal extends Component
{
    public Product $product;

    #[On('set-product-delete-modal')]
    public function setProduct(string $id)
    {
        $this->product = Product::find($id);
    }

    public function delete()
    {
        if ($this->product->image) {
            Storage::delete($this->product->image);
        }
        $this->product->delete();

        session()->flash('message', __('dashboard/products.delete.success-message'));

        return $this->redirectRoute('dashboard.products.index');
    }

    public function render()
    {
        return view('dashboard.components.livewire.modals.product.delete-product-modal');
    }
}
