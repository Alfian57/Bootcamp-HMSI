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
            'description' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'category_id' => ['required', 'exists:categories,id'],
            'weight' => ['required', 'numeric'],
            'stock' => ['required', 'integer'],
            'image' => ['nullable', 'image', 'max:10240'],
        ];
    }
}
