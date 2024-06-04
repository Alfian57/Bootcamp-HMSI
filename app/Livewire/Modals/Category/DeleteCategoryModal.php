<?php

namespace App\Livewire\Modals\Category;

use Livewire\Component;

class DeleteCategoryModal extends Component
{
    public $category;

    public function mount($category)
    {
        $this->category = $category;
    }

    public function delete()
    {
        $this->category->delete();
        toast(__('dashboard/categories.delete.success-message'), 'success');
        $this->redirect(route('dashboard.categories.index'));
    }

    public function render()
    {
        return view('dashboard.components.livewire.modals.category.delete-category-modal');
    }
}
