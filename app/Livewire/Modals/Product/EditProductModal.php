<?php

namespace App\Livewire\Modals\Product;

use App\Livewire\Forms\EditProductForm;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProductModal extends Component
{
    use WithFileUploads;

    public EditProductForm $form;

    public Product $product;

    public Collection $categories;

    public bool $isEmptyImage = false;

    public bool $isImageNew = false;

    public function mount()
    {
        $this->categories = Category::pluck('name', 'id');
    }

    #[On('set-product-edit-modal')]
    public function setProduct(string $id)
    {
        $product = Product::find($id);

        $this->product = $product;

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
        $data = $this->form->all();

        if ($this->isEmptyImage) {
            $this->form->image = null;
        }

        if (!$this->isImageNew) {
            unset($data['image']);
        }

        $this->form->validate();

        if ($this->form->image && $this->product->image) {
            Storage::delete($this->product->image);
        }

        if (!$this->isEmptyImage && $this->form->image) {
            $data['image'] = $this->form->image->store('products');
        }

        if ($this->isEmptyImage) {
            $data['image'] = null;
        }
        $this->product->update($data);
        $this->reset();

        session()->flash('message', __('dashboard/products.edit.success-message'));

        return $this->redirectRoute('dashboard.products.index');
    }

    public function toogleEmptyImage()
    {
        $this->isEmptyImage = !$this->isEmptyImage;
    }

    public function toogleIsImageNew()
    {
        $this->isImageNew = true;
    }

    public function render()
    {
        return view('dashboard.components.livewire.modals.product.edit-product-modal');
    }
}
