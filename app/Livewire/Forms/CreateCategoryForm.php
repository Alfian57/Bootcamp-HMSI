<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class CreateCategoryForm extends Form
{
    public string $name = '';

    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:categories'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('dashboard/categories.form.name.attribute'),
        ];
    }
}
