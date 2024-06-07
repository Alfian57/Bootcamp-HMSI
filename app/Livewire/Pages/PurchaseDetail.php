<?php

namespace App\Livewire\Pages;

use App\Models\Purchase;
use Livewire\Component;

class PurchaseDetail extends Component
{
    public Purchase $purchase;

    public function mount(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    public function render()
    {
        return view('dashboard.pages.purchase.show');
    }
}
