<?php

namespace App\Livewire;

use App\Exports\ProductsExport;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
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
        $this->setAdditionalSelects(['products.id as id', 'products.slug as slug', 'products.image as image']);
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
            'exportSelected' => __('dashboard/global.bulk-action.export-excel'),
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

    public function exportSelected()
    {
        $fileName = 'products_'.date('Y-m-d_H-i-s').'.xlsx';

        return Excel::download(new ProductsExport($this->getSelected()), $fileName);
    }

    public function columns(): array
    {
        return [
            Column::make(__('dashboard/products.datatable.column.name'), 'name')
                ->sortable()
                ->secondaryHeaderFilter('product_name'),

            Column::make(__('dashboard/products.datatable.column.price'), 'price')
                ->sortable()
                ->format(fn ($value) => 'Rp. '.number_format($value, 2))
                ->collapseOnMobile(),

            Column::make(__('dashboard/products.datatable.column.category'), 'category.name')
                ->sortable()
                ->secondaryHeaderFilter('product_category')
                ->collapseOnMobile(),

            ImageColumn::make(__('dashboard/products.datatable.column.image'), 'image')
                ->location(
                    fn ($row) => asset('storage/'.$row->image)
                )
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
                ->collapseAlways(),

            Column::make(__('dashboard/products.datatable.column.action'))
                ->label(function ($row) {
                    $deleteButton = view('datatable.components.shared.button.delete-button', [
                        'href' => route('dashboard.products.destroy', $row->slug),
                    ]);

                    $editButton = view('datatable.components.shared.button.action-button', [
                        'href' => route('dashboard.products.edit', $row->slug),
                        'class' => 'btn-warning',
                        'text' => __('dashboard/global.edit-btn'),
                        'navigate' => true,
                    ]);

                    return view('datatable.components.shared.action-container.index', [
                        'components' => [$deleteButton, $editButton],
                    ]);
                }),
        ];
    }
}
