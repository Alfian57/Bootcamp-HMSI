<?php

namespace App\Livewire\Modals\Category;

use App\Livewire\Forms\CreateCategoryForm;
use App\Models\Category;
use Livewire\Component;

class CreateCategoryModal extends Component
{
    public CreateCategoryForm $form;

    public function save()
    {
        $this->validate();
        Category::create($this->form->all());
        $this->reset();

        toast(__('dashboard/categories.create.success-message'), 'success');
        $this->redirect(route('dashboard.categories.index'));
    }

    public function render()
    {
        return view('dashboard.components.livewire.modals.category.create-category-modal');
    }
}
