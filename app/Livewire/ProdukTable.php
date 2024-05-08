<?php

namespace App\Livewire;

use App\Enums\KategoriProduk;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
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
                    $builder->where('produk.nama_produk', 'like', '%'.$value.'%');
                }),

            SelectFilter::make('Status Pembayaran', 'kategori_produk')
                ->options([
                    '' => 'Pilih',
                    KategoriProduk::ELEKTRONIK->value => 'Elektronik',
                    KategoriProduk::KOMPUTER->value => 'Komputer',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('produk.kategori_produk', $value);
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
            Column::make('Nama', 'nama_produk')
                ->sortable()
                ->secondaryHeaderFilter('nama_produk'),

            Column::make('Harga', 'harga_produk')
                ->sortable()
                ->format(function ($value) {
                    return 'Rp. '.number_format($value, 2);
                }),

            Column::make('Kategori', 'kategori_produk')
                ->sortable()
                ->secondaryHeaderFilter('kategori_produk')
                ->attributes(fn ($value) => [
                    'class' => 'text-capitilize font-weight-bold',
                ]),

            ImageColumn::make('Gambar Produk', 'gambar_produk')
                ->location(
                    fn ($row) => asset('storage/'.$row->gambar_produk)
                )
                ->attributes(fn ($row) => [
                    'class' => 'text-danger font-weight-bold',
                    'alt' => $row->name.'Gambar rusak',
                    'style' => 'width: 50px;',
                ]),

            Column::make('Aksi')
                ->label(function ($row) {
                    $deleteButton = view('datatable.components.shared.button.delete-button', [
                        'href' => route('dashboard.produk.destroy', $row->id),
                    ]);

                    $editButton = view('datatable.components.shared.button.edit-button', [
                        'href' => route('dashboard.produk.edit', $row->id),
                    ]);

                    return view('datatable.components.shared.action-container.index', [
                        'components' => [$deleteButton, $editButton],
                    ]);
                }),
        ];
    }
}
