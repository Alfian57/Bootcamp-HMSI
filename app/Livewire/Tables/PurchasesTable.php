<?php

namespace App\Livewire\Tables;

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
        $this->setSortingDisabled();
        $this->setAdditionalSelects(['purchases.id as id']);
    }

    public function filters(): array
    {
        return [
            TextFilter::make(__('dashboard/purchases.datatable.filter.customer-name.label'), 'customer_name')
                ->config([
                    'placeholder' => __('dashboard/purchases.datatable.filter.customer-name.placeholder'),
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('user.name', 'like', '%'.$value.'%');
                }),

            SelectFilter::make(__('dashboard/purchases.datatable.filter.purchase-status.label'), 'purchase_status')
                ->options([
                    '' => __('dashboard/purchases.datatable.filter.purchase-status.items.all'),
                    PurchaceStatus::UNPAID->value => __('dashboard/purchases.datatable.filter.purchase-status.items.unpaid'),
                    PurchaceStatus::PAID->value => __('dashboard/purchases.datatable.filter.purchase-status.items.paid'),
                    PurchaceStatus::BEING_SHIPPED->value => __('dashboard/purchases.datatable.filter.purchase-status.items.being-shipped'),
                    PurchaceStatus::COMPLETED->value => __('dashboard/purchases.datatable.filter.purchase-status.items.completed'),
                    PurchaceStatus::CANCELLED->value => __('dashboard/purchases.datatable.filter.purchase-status.items.cancelled'),
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('purchases.status', $value);
                }),

            DateRangeFilter::make(__('dashboard/purchases.datatable.filter.purchase-time.label'), 'purchase_date')
                ->config([
                    'placeholder' => __('dashboard/purchases.datatable.filter.purchase-time.placeholder'),
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
            Column::make(__('dashboard/purchases.datatable.column.customer-name'), 'user.name')
                ->sortable()
                ->secondaryHeaderFilter('customer_name'),

            Column::make(__('dashboard/purchases.datatable.column.total-price'), 'total_price')
                ->format(fn ($value) => 'Rp '.number_format($value, 2))
                ->sortable()
                ->collapseOnTablet(),

            Column::make(__('dashboard/purchases.datatable.column.total-weight'), 'total_weight')
                ->format(fn ($value) => $value.' kg')
                ->sortable()
                ->collapseOnTablet(),

            Column::make(__('dashboard/purchases.datatable.column.status'), 'status')
                ->sortable()
                ->format(fn ($value) => $this->displayStatus($value))
                ->secondaryHeaderFilter('purchase_status')
                ->collapseOnMobile(),

            Column::make(__('dashboard/purchases.datatable.column.created-at'), 'created_at')
                ->sortable()
                ->secondaryHeaderFilter('purchase_date'),

            Column::make(__('dashboard/purchases.datatable.column.action'))
                ->label(function ($row) {
                    $detailButton = view('datatable.components.shared.button.action-button', [
                        'href' => route('dashboard.purchases.show', $row->id),
                        'class' => 'btn-primary',
                        'text' => __('dashboard/global.detail-btn'),
                        'navigate' => true,
                    ]);

                    $exportPdfButton = view('datatable.components.shared.button.action-button', [
                        'href' => route('dashboard.purchases.export-pdf', $row->id),
                        'class' => 'btn-info',
                        'text' => __('dashboard/global.download-pdf-btn'),
                    ]);

                    $exportExcelButton = view('datatable.components.shared.button.action-button', [
                        'href' => route('dashboard.purchases.export-excel', $row->id),
                        'class' => 'btn-secondary',
                        'text' => __('dashboard/global.download-excel-btn'),
                    ]);

                    return view('datatable.components.shared.action-container.index', [
                        'components' => [$detailButton, $exportPdfButton, $exportExcelButton],
                    ]);
                }),
        ];
    }

    private function displayStatus($value): string
    {
        if ($value == PurchaceStatus::UNPAID->value) {
            return __('enum.purchase-status.unpaid');
        } elseif ($value == PurchaceStatus::PAID->value) {
            return __('enum.purchase-status.paid');
        } elseif ($value == PurchaceStatus::BEING_SHIPPED->value) {
            return __('enum.purchase-status.being-shipped');
        } elseif ($value == PurchaceStatus::COMPLETED->value) {
            return __('enum.purchase-status.completed');
        } elseif ($value == PurchaceStatus::CANCELLED->value) {
            return __('enum.purchase-status.cancelled');
        }

        return '';
    }
}
