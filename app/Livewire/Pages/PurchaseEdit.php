<?php

namespace App\Livewire\Pages;

use App\Livewire\Forms\EditPurchaseForm;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\User;
use Livewire\Component;

class PurchaseEdit extends Component
{
    public EditPurchaseForm $form;

    public Purchase $purchase;

    public $users;

    public $productOptions;

    public function mount(Purchase $purchase)
    {
        $this->users = User::where('is_admin', false)->pluck('name', 'id');
        $this->users->prepend(__('model.user'), null);

        $this->productOptions = Product::pluck('name', 'id');
        $this->productOptions->prepend(__('model.product'), null);

        $this->purchase = $purchase;
        $this->form->status = $purchase->status;
        $this->form->user_id = $purchase->user_id;
        foreach ($purchase->purchaseItems as $purchaseItem) {
            $this->form->purchaseItems[] = [
                'product_id' => $purchaseItem->product_id,
                'quantity' => $purchaseItem->quantity,
                'note' => $purchaseItem->note,
            ];
        }
    }

    public function addPurchaseItem()
    {
        $this->form->purchaseItems[] = [
            'product_id' => '',
            'quantity' => 0,
            'note' => '',
        ];
    }

    public function edit()
    {
        $this->form->validate();

        $totalWeight = 0;
        $totalPrice = 0;
        foreach ($this->form->purchaseItems as $item) {
            $product = Product::find($item['product_id']);
            $price = $product->price;
            $weight = $product->weight;

            $totalWeight += $weight * $item['quantity'];
            $totalPrice += $price * $item['quantity'];
        }
        $this->purchase->update([
            'status' => $this->form->status,
            'user_id' => $this->form->user_id,
            'total_price' => $totalPrice,
            'total_weight' => $totalWeight,
        ]);
        PurchaseItem::where('purchase_id', $this->purchase->id)->delete();

        foreach ($this->form->purchaseItems as $item) {
            $item['total_price'] = Product::find($item['product_id'])->price * $item['quantity'];
            $this->purchase->purchaseItems()->create($item);
        }

        session()->flash('message', __('dashboard/purchases.edit.success-message'));

        return $this->redirect(route('dashboard.purchases.index'));
    }

    public function deleteItem($index)
    {
        unset($this->form->purchaseItems[$index]);
        $this->form->purchaseItems = array_values($this->form->purchaseItems);
    }

    public function render()
    {
        return view('dashboard.pages.purchase.edit');
    }
}
