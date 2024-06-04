<?php

namespace App\Http\Controllers;

use App\Exports\PurchaseExport;
use App\Http\Requests\StorePurchaseRequest;
use App\Models\Purchase;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class PurchaseController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.purchase.index');
    }

    public function create()
    {
        return view('dashboard.pages.purchase.create');
    }

    public function store(StorePurchaseRequest $request)
    {
        //
    }

    public function show(Purchase $purchase)
    {
        return view('dashboard.pages.purchase.show', compact('purchase'));
    }

    public function exportExcel(Purchase $purchase)
    {
        $fileName = 'purchases_'.$purchase->user->name.'_'.date('Y-m-d_H-i-s').'.xlsx';

        return Excel::download(new PurchaseExport($purchase), $fileName);
    }

    public function exportPdf(Purchase $purchase)
    {
        $fileName = 'purchases_'.$purchase->user->name.'_'.date('Y-m-d_H-i-s').'.pdf';
        $pdf = Pdf::loadView('export.purchase-pdf', compact('purchase'));

        return $pdf->download($fileName);
    }
}
