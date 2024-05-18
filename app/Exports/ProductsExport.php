<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    private array $productIds;

    public function __construct(array $productIds)
    {
        $this->productIds = $productIds;
    }

    public function headings(): array
    {
        return ['Nama Produk', 'Harga', 'Kategori', 'Stok', 'Berat', 'Deskripsi', 'Dibuat Pada'];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Product::query()
            ->whereIn('id', $this->productIds)
            ->select('name', 'price', 'category', 'stock', 'weight', 'description', 'created_at')
            ->get()
            ->each(function ($product) {
                $product->price = 'Rp. '.number_format($product->price, 2);
                $product->weight = $product->weight.' kg';
                $product->created_at = $product->created_at->format('Y-m-d');
            });
    }
}
