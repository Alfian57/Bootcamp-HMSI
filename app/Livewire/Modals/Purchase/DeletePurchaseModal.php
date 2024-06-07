<?php

namespace App\Livewire\Modals\Purchase;

use App\Models\Purchase;
use Livewire\Attributes\On;
use Livewire\Component;

class DeletePurchaseModal extends Component
{
    public Purchase $purchase;

    #[On('set-purchase-delete-modal')]
    public function setPurchase(string $id)
    {
        $this->purchase = Purchase::find($id);
    }

    public function delete()
    {
        $this->purchase->delete();

        session()->flash('message', __('dashboard/purchases.delete.success-message'));

        return $this->redirect(route('dashboard.purchases.index'), true);
    }

    public function render()
    {
        return view('dashboard.components.livewire.modals.purchase.delete-purchase-modal');
    }
}
