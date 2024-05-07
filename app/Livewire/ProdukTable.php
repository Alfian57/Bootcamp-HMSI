<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class ProdukTable extends DataTableComponent
{
    protected $model = Produk::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchStatus(false);
        $this->setFiltersVisibilityStatus(false);
        $this->setAdditionalSelects(['produk.id_produk as id']);
    }

    public function filters(): array
    {
        return [
            TextFilter::make('Nama Produk', 'nama_produk')
                ->config([
                    'placeholder' => 'Cari Produk',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('produk.nama_produk', 'like', '%' . $value . '%');
                }),
        ];
    }

    public function builder(): Builder
    {
        return Produk::query()
            ->latest('produk.created_at');
    }

    public function columns(): array
    {
        return [
            Column::make("Nama produk", "nama_produk")
                ->sortable()
                ->secondaryHeaderFilter('nama_produk'),

            Column::make("Created at", "created_at")
                ->sortable(),

            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
