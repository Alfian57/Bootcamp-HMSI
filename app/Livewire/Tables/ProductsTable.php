<?php

namespace App\Livewire\Tables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class ProductsTable extends DataTableComponent
{
    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchStatus(false);
        $this->setFiltersVisibilityStatus(false);
        $this->setAdditionalSelects(['products.id as id', 'products.image as image']);
    }

    public function filters(): array
    {
        return [
            TextFilter::make(__('dashboard/products.datatable.filter.product-name.label'), 'product_name')
                ->config([
                    'placeholder' => __('dashboard/products.datatable.filter.product-name.placeholder'),
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('products.name', 'like', '%'.$value.'%');
                }),

            TextFilter::make(__('dashboard/products.datatable.filter.product-category.label'), 'product_category')
                ->config([
                    'placeholder' => __('dashboard/products.datatable.filter.product-category.placeholder'),
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('products.name', 'like', '%'.$value.'%');
                }),
        ];
    }

    public function builder(): Builder
    {
        return Product::query()
            ->latest('products.created_at');
    }

    public function bulkActions(): array
    {
        return [
            'deleteSelected' => __('dashboard/global.bulk-action.delete'),
        ];
    }

    public function deleteSelected()
    {
        Product::whereIn('id', $this->getSelected())->get()->each(function ($product) {
            if ($product->image) {
                Storage::delete($product->image);
            }
        });

        Product::whereIn('id', $this->getSelected())->delete();
    }

    public function columns(): array
    {
        return [
            Column::make(__('dashboard/products.datatable.column.name'), 'name')
                ->secondaryHeaderFilter('product_name'),

            Column::make(__('dashboard/products.datatable.column.price'), 'price')
                ->format(fn ($value) => 'Rp. '.number_format($value, 2))
                ->collapseOnMobile(),

            Column::make(__('dashboard/products.datatable.column.category'), 'category.name')
                ->secondaryHeaderFilter('product_category')
                ->collapseOnMobile(),

            ImageColumn::make(__('dashboard/products.datatable.column.image'), 'image')
                ->location(function ($row) {
                    if ($row->image) {
                        return asset('storage/'.$row->image);
                    }

                    return asset('assets/static/images/unknown.png');
                })
                ->attributes(fn ($row) => [
                    'class' => 'text-danger font-weight-bold',
                    'alt' => __('dashboard/global.image-error'),
                    'style' => 'width: 50px;',
                ])
                ->collapseOnTablet(),

            Column::make(__('dashboard/products.datatable.column.stock'), 'stock')
                ->collapseAlways(),

            Column::make(__('dashboard/products.datatable.column.weight'), 'weight')
                ->format(fn ($value) => $value.' kg')
                ->collapseAlways(),

            Column::make(__('dashboard/products.datatable.column.description'), 'description')
                ->format(fn ($value) => $value ?? __('dashboard/global.no-description'))
                ->collapseAlways(),

            Column::make(__('dashboard/products.datatable.column.action'))
                ->label(function ($row) {
                    return view('datatable.components.shared.column.product-action-column', ['id' => $row->id]);
                }),
        ];
    }
}
