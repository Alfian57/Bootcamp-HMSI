<?php

namespace App\Livewire\Modals\Category;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;

class DeleteCategoryModal extends Component
{
    public Category $category;

    #[On('set-category-delete-modal')]
    public function setCategory(string $id)
    {
        $this->category = Category::find($id);
    }

    public function delete()
    {
        $this->category->delete();
        toast(__('dashboard/categories.delete.success-message'), 'success');

        return $this->redirect(route('dashboard.categories.index'), true);
    }

    public function render()
    {
        return view('dashboard.components.livewire.modals.category.delete-category-modal');
    }
}
