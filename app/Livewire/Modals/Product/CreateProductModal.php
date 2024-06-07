<?php

namespace App\Livewire\Modals\Product;

use App\Livewire\Forms\CreateProductForm;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProductModal extends Component
{
    use WithFileUploads;

    public CreateProductForm $form;

    public Collection $categories;

    public function mount()
    {
        $this->categories = Category::pluck('name', 'id');
        $this->categories->prepend(__('model.category'), null);
    }

    public function save()
    {
        $this->validate();
        $data = $this->form->all();
        if ($this->form->image) {
            $data['image'] = $this->form->image->store('products');
        }
        Product::create($data);

        $this->reset();

        session()->flash('message', __('dashboard/products.create.success-message'));

        return $this->redirectRoute('dashboard.products.index', navigate: true);
    }

    public function render()
    {
        return view('dashboard.components.livewire.modals.product.create-product-modal');
    }
}
