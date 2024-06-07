<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\Rule;
use Livewire\Form;

class EditCategoryForm extends Form
{
    public string $id = '';

    public string $name = '';

    public function rules(): array
    {
        return [
            'name' => ['required', Rule::unique('categories')->ignore($this->id)],
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'name' => __('dashboard/categories.form.name.attribute'),
        ];
    }
}
