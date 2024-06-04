<?php

namespace App\Livewire\Tables;

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
        $this->setSortingDisabled();
        $this->setAdditionalSelects(['purchase_items.id as id']);
    }

    public function filters(): array
    {
        return [
            TextFilter::make(__('dashboard/purchase-items.datatable.filter.product-name.label'), 'product_name')
                ->config([
                    'placeholder' => __('dashboard/purchase-items.datatable.filter.product-name.placeholder'),
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
            Column::make(__('dashboard/purchase-items.datatable.column.product-name'), 'product.name')
                ->sortable()
                ->secondaryHeaderFilter('product_name'),

            Column::make(__('dashboard/purchase-items.datatable.column.price'), 'product.price')
                ->format(fn ($value) => 'Rp '.number_format($value, 2))
                ->sortable()
                ->collapseOnMobile(),

            Column::make(__('dashboard/purchase-items.datatable.column.quantity'), 'quantity')
                ->format(fn ($value) => $value.' Barang')
                ->sortable(),

            Column::make(__('dashboard/purchase-items.datatable.column.price'), 'total_price')
                ->format(fn ($value) => 'Rp '.number_format($value, 2))
                ->sortable(),

            Column::make(__('dashboard/purchase-items.datatable.column.note'), 'note')
                ->collapseAlways(),
        ];
    }
}
