<?php

namespace App\Http\Controllers;

use App\Exports\PurchaseExport;
use App\Models\Purchase;
use Maatwebsite\Excel\Facades\Excel;

class PurchaseController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.purchase.index');
    }

    public function show(Purchase $purchase)
    {
        return view('dashboard.pages.purchase.show', [
            'purchase' => $purchase,
        ]);
    }

    public function export(Purchase $purchase)
    {
        $fileName = 'purchases_'.$purchase->user->name.'_'.date('Y-m-d_H-i-s').'.xlsx';

        return Excel::download(new PurchaseExport($purchase), $fileName);
    }
}
