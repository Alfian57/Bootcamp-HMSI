<?php

namespace App\Livewire;

use App\Models\Purchase;
use App\Models\PurchaseItem;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class PurchaseItemsTable extends DataTableComponent
{
    protected $model = PurchaseItem::class;

    public Purchase $purchase;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchStatus(false);
        $this->setFiltersVisibilityStatus(false);
        $this->setAdditionalSelects(['purchase_items.id as id']);
    }

    public function filters(): array
    {
        return [
            TextFilter::make('Nama Barang', 'product_name')
                ->config([
                    'placeholder' => 'Cari Barang',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('product.name', 'like', '%'.$value.'%');
                }),
        ];
    }

    public function builder(): Builder
    {
        return PurchaseItem::query()
            ->where('purchase_items.purchase_id', $this->purchase->id)
            ->latest('purchase_items.created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Nama Barang', 'product.name')
                ->sortable()
                ->secondaryHeaderFilter('product_name'),

            Column::make('Harga Satuan', 'product.price')
                ->format(fn ($value) => 'Rp '.number_format($value, 2))
                ->sortable()
                ->collapseOnMobile(),

            Column::make('Kuantitas', 'quantity')
                ->format(fn ($value) => $value.' Barang')
                ->sortable(),

            Column::make('Total Harga', 'total_price')
                ->format(fn ($value) => 'Rp '.number_format($value, 2))
                ->sortable(),

            Column::make('Catatan', 'note')
                ->collapseAlways(),
        ];
    }
}
