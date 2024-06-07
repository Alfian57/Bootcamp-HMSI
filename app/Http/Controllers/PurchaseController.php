<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Barryvdh\DomPDF\Facade\Pdf;

class PurchaseController extends Controller
{
    public function exportPdf(Purchase $purchase)
    {
        $fileName = 'purchases_' . $purchase->user->name . '_' . date('Y-m-d_H-i-s') . '.pdf';
        $pdf = Pdf::loadView('export.purchase-pdf', compact('purchase'));

        return $pdf->download($fileName);
    }
}
