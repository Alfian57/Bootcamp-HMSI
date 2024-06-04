<?php

namespace App\Livewire\Modals\Product;

use App\Livewire\Forms\EditProductForm;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProductModal extends Component
{
    use WithFileUploads;

    public EditProductForm $form;

    public Product $product;

    public Collection $categories;

    public bool $isEmptyImage = false;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->categories = Category::pluck('name', 'id');

        $this->form->name = $product->name;
        $this->form->description = $product->description;
        $this->form->price = $product->price;
        $this->form->category_id = $product->category_id;
        $this->form->weight = $product->weight;
        $this->form->stock = $product->stock;
        $this->form->image = $product->image;
    }

    public function edit()
    {
        $this->validate();

        $data = $this->form->all();
        if ($this->form->image) {
            $this->product->deleteImage();
        }

        if ($this->isEmptyImage) {
            $data['image'] = null;
        } else {
            $data['image'] = $this->form->image->store('products');
        }

        $this->product->update($data);

        $this->reset();

        toast(__('dashboard/products.edit.success-message'), 'success');

        return $this->redirect(route('dashboard.products.index'));
    }

    public function toogleEmptyImage()
    {
        $this->isEmptyImage = ! $this->isEmptyImage;
    }

    public function render()
    {
        return view('dashboard.components.livewire.modals.product.edit-product-modal');
    }
}
