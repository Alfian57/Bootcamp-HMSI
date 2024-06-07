<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class CreateProductForm extends Form
{
    public string $name = '';

    public string $description = '';

    public int $price = 0;

    public string $category_id = '';

    public int $weight = 0;

    public int $stock = 0;

    public $image;

    public function rules()
    {
        return [
            'name' => ['required'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'integer'],
            'category_id' => ['required', 'exists:categories,id'],
            'weight' => ['required', 'numeric'],
            'stock' => ['required', 'integer'],
            'image' => ['nullable', 'image', 'max:10240'],
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'name' => __('dashboard/users.form.name.attribute'),
            'description' => __('dashboard/users.form.description.attribute'),
            'price' => __('dashboard/users.form.price.attribute'),
            'category' => __('dashboard/users.form.category.attribute'),
            'weight' => __('dashboard/users.form.weight.attribute'),
            'stock' => __('dashboard/users.form.stock.attribute'),
            'image' => __('dashboard/users.form.image.attribute'),
        ];
    }
}
