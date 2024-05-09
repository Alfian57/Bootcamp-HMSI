<?php

namespace App\Livewire;

use App\Enums\ProductCategory;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class ProductsTable extends DataTableComponent
{
    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchStatus(false);
        $this->setFiltersVisibilityStatus(false);
        $this->setAdditionalSelects(['products.slug as slug', 'products.image as image']);
    }

    public function filters(): array
    {
        return [
            TextFilter::make('Nama Produk', 'product_name')
                ->config([
                    'placeholder' => 'Cari Produk',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('products.name', 'like', '%'.$value.'%');
                }),

            SelectFilter::make('Status Pembayaran', 'product_category')
                ->options([
                    '' => 'Pilih',
                    ProductCategory::ELECTRONIC->value => 'Elektronik',
                    ProductCategory::COMPUTER->value => 'Komputer',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('products.category', $value);
                }),
        ];
    }

    public function builder(): Builder
    {
        return Product::query()
            ->latest('products.created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Nama', 'name')
                ->sortable()
                ->secondaryHeaderFilter('product_name'),

            Column::make('Harga', 'price')
                ->sortable()
                ->format(function ($value) {
                    return 'Rp. '.number_format($value, 2);
                }),

            Column::make('Kategori', 'category')
                ->sortable()
                ->secondaryHeaderFilter('product_category')
                ->attributes(fn ($value) => [
                    'class' => 'text-capitilize font-weight-bold',
                ]),

            ImageColumn::make('Gambar Produk', 'image')
                ->location(
                    fn ($row) => asset('storage/'.$row->image)
                )
                ->attributes(fn ($row) => [
                    'class' => 'text-danger font-weight-bold',
                    'alt' => 'Gambar rusak',
                    'style' => 'width: 50px;',
                ]),

            Column::make('Aksi')
                ->label(function ($row) {
                    $deleteButton = view('datatable.components.shared.button.delete-button', [
                        'href' => route('dashboard.products.destroy', $row->slug),
                    ]);

                    $editButton = view('datatable.components.shared.button.edit-button', [
                        'href' => route('dashboard.products.edit', $row->slug),
                    ]);

                    return view('datatable.components.shared.action-container.index', [
                        'components' => [$deleteButton, $editButton],
                    ]);
                }),
        ];
    }
}
