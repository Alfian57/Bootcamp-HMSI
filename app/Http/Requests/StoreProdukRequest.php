<?php

namespace App\Http\Requests;

use App\Enums\ProductCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'category' => ['required', Rule::in([ProductCategory::ELECTRONIC->value, ProductCategory::COMPUTER->value])],
            'weight' => ['required', 'integer'],
            'stock' => ['required', 'integer'],
            'image' => ['image'],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array<string, string>
     */
    public function attributes(): array
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
