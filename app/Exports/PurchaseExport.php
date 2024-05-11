<?php

namespace App\Exports;

use App\Enums\PurchaceStatus;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PurchaseExport implements FromCollection, WithHeadings
{
    private Purchase $purchase;

    public function __construct(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    public function headings(): array
    {
        return [
            ['Nama Pembeli', $this->purchase->user->name],
            ['Total Harga', 'Rp '.number_format($this->purchase->total_price, 2)],
            ['Total Berat', $this->purchase->total_weight.' kg'],
            ['Status', $this->displayStatus($this->purchase->status)],
            ['Waktu Pembelian', $this->purchase->created_at->format('Y-m-d H:i:s')],
            [],
            ['Detail Pembelian'],
            ['Nama Barang', 'Harga Satuan', 'Kuantitas', 'Total Harga', 'Catatan'],
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return PurchaseItem::query()
            ->where('purchase_id', $this->purchase->id)
            ->join('products', 'products.id', '=', 'purchase_items.product_id')
            ->select('products.name', 'products.price as price', 'quantity', 'total_price', 'note')
            ->get()
            ->each(function ($item) {
                $item->price = 'Rp '.number_format($item->price, 2);
                $item->quantity = $item->quantity.' barang';
                $item->total_price = 'Rp '.number_format($item->total_price, 2);
            });
    }

    private function displayStatus($value): string
    {
        $statuses = [
            PurchaceStatus::UNPAID->value => 'Belum Dibayar',
            PurchaceStatus::PAID->value => 'Sudah Dibayar',
            PurchaceStatus::BEING_SHIPPED->value => 'Sedang Dikirim',
            PurchaceStatus::COMPLETED->value => 'Selesai',
            PurchaceStatus::CANCELLED->value => 'Dibatalkan',
        ];

        return $statuses[$value];
    }
}
