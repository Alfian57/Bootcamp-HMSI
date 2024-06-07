<?php

namespace App\Livewire\Pages;

use App\Livewire\Forms\CreatePurchaseForm;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use Livewire\Component;

class PurchaseCreate extends Component
{
    public CreatePurchaseForm $form;

    public $productOptions;

    public $statusOptions;

    public $purchaseItems;

    public $users;

    public function mount()
    {
        $this->users = User::where('is_admin', false)->pluck('name', 'id');
        $this->users->prepend(__('model.user'), null);

        $this->productOptions = Product::pluck('name', 'id');
        $this->productOptions->prepend(__('model.product'), null);

        $this->statusOptions = [
            'unpaid' => __('enum.purchase-status.unpaid'),
            'paid' => __('enum.purchase-status.paid'),
            'being shipped' => __('enum.purchase-status.being-shipped'),
            'completed' => __('enum.purchase-status.completed'),
            'cancelled' => __('enum.purchase-status.cancelled'),
        ];
        $this->form->status = 'unpaid';

        $this->purchaseItems = [];
    }

    public function addPurchaseItem()
    {
        $this->form->purchaseItems[] = [
            'product_id' => '',
            'quantity' => 0,
            'note' => '',
        ];
    }

    public function save()
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
        $purchase = Purchase::create([
            'status' => $this->form->status,
            'user_id' => $this->form->user_id,
            'total_price' => $totalPrice,
            'total_weight' => $totalWeight,
        ]);
        foreach ($this->form->purchaseItems as $item) {
            $item['total_price'] = Product::find($item['product_id'])->price * $item['quantity'];
            $purchase->purchaseItems()->create($item);
        }

        session()->flash('message', __('dashboard/purchases.create.success-message'));

        return $this->redirect(route('dashboard.purchases.index'), true);
    }

    public function deleteItem($index)
    {
        unset($this->form->purchaseItems[$index]);
        $this->form->purchaseItems = array_values($this->form->purchaseItems);
    }

    public function render()
    {
        return view('dashboard.pages.purchase.create');
    }
}
