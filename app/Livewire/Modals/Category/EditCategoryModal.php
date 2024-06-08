<?php

namespace App\Livewire\Modals\Category;

use App\Livewire\Forms\EditCategoryForm;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;

class EditCategoryModal extends Component
{
    public EditCategoryForm $form;

    public Category $category;

    #[On('set-category-edit-modal')]
    public function setCategory(string $id)
    {
        $category = Category::find($id);

        $this->category = $category;
        $this->form->id = $category->id;
        $this->form->name = $category->name;
    }

    public function edit()
    {
        $this->validate();
        $this->category->update($this->form->all());
        $this->reset();

        toast(__('dashboard/categories.edit.success-message'), 'success');

        return $this->redirect(route('dashboard.categories.index'));
    }

    public function render()
    {
        return view('dashboard.components.livewire.modals.category.edit-category-modal');
    }
}
