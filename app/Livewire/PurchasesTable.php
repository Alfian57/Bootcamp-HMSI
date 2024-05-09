<?php

namespace App\Livewire;

use App\Enums\PurchaceStatus;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class PurchasesTable extends DataTableComponent
{
    protected $model = Purchase::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchStatus(false);
        $this->setFiltersVisibilityStatus(false);
        $this->setAdditionalSelects(['purchases.id as id']);
    }

    public function filters(): array
    {
        return [
            TextFilter::make('Nama Pengguna', 'user_name')
                ->config([
                    'placeholder' => 'Cari Pengguna',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('user.name', 'like', '%' . $value . '%');
                }),

            SelectFilter::make('Jenis Kelamin', 'purchase_status')
                ->options([
                    '' => 'Pilih',
                    PurchaceStatus::UNPAID->value => 'Belum DIbayar',
                    PurchaceStatus::PAID->value => 'Sudah Dibayar',
                    PurchaceStatus::BEING_SHIPPED->value => 'Sedang Dikirim',
                    PurchaceStatus::COMPLETED->value => 'Selesai',
                    PurchaceStatus::CANCELLED->value => 'Dibatalkan',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('purchases.status', $value);
                }),

            DateRangeFilter::make('Tanggal Pembelian', 'purchase_date')
                ->config([
                    'placeholder' => 'Tanggal Pembelian',
                ])
                ->filter(function (Builder $builder, array $dateRange) {
                    $builder
                        ->whereDate('purchases.created_at', '>=', $dateRange['minDate'])
                        ->whereDate('purchases.created_at', '<=', $dateRange['maxDate']);
                }),
        ];
    }

    public function builder(): Builder
    {
        return Purchase::query()
            ->latest('purchases.created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Nama Pembeli', 'user.name')
                ->sortable()
                ->secondaryHeaderFilter('user_name'),

            Column::make('Total Harga', 'total_price')
                ->format(fn ($value) => 'Rp ' . number_format($value, 2))
                ->sortable()
                ->collapseOnTablet(),

            Column::make('Total Berat', 'total_weight')
                ->format(fn ($value) => $value . ' kg')
                ->sortable()
                ->collapseOnTablet(),

            Column::make('Status', 'status')
                ->sortable()
                ->format(fn ($value) => $this->displayStatus($value))
                ->secondaryHeaderFilter('purchase_status')
                ->collapseOnMobile(),

            Column::make('Waktu Pembelian', 'created_at')
                ->sortable()
                ->secondaryHeaderFilter('purchase_date'),

            Column::make('Aksi')
                ->label(function ($row) {
                    $detailButton = view('datatable.components.shared.button.action-button', [
                        'href' => route('dashboard.users.edit', $row->id),
                        'class' => 'btn-primary',
                        'text' => 'Detail'
                    ]);

                    return view('datatable.components.shared.action-container.index', [
                        'components' => [$detailButton],
                    ]);
                }),
        ];
    }

    private function displayStatus($value): string
    {
        if ($value == PurchaceStatus::UNPAID->value) {
            return 'Belum Dibayar';
        } else if ($value == PurchaceStatus::PAID->value) {
            return 'Sudah Dibayar';
        } else if ($value == PurchaceStatus::BEING_SHIPPED->value) {
            return 'Sedang Dikirim';
        } else if ($value == PurchaceStatus::COMPLETED->value) {
            return 'Selesai';
        } else if ($value == PurchaceStatus::CANCELLED->value) {
            return 'Dibatalkan';
        } else {
            return "";
        }
    }
}
