<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class CreatePurchaseForm extends Form
{
    public string $status = '';

    public string $user_id = '';

    public array $purchaseItems = [];

    public function rules()
    {
        return [
            'status' => 'required',
            'user_id' => 'required|exists:users,id',
            'purchaseItems.*.product_id' => 'required|exists:products,id',
            'purchaseItems.*.quantity' => 'required|numeric|min:1',
            'purchaseItems.*.note' => 'nullable',
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'status' => __('dashboard/purchases.form.status.attribute'),
            'user_id' => __('dashboard/purchases.form.user.attribute'),
            'purchaseItems.*.product_id' => __('dashboard/purchases.form.product.attribute'),
            'purchaseItems.*.quantity' => __('dashboard/purchases.form.quantity.attribute'),
            'purchaseItems.*.note' => __('dashboard/purchases.form.note.attribute'),
        ];
    }
}
