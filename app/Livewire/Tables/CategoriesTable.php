<?php

namespace App\Livewire\Tables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class CategoriesTable extends DataTableComponent
{
    protected $model = Category::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchStatus(false);
        $this->setFiltersVisibilityStatus(false);
        $this->setAdditionalSelects(['categories.id as id']);
    }

    public function filters(): array
    {
        return [
            TextFilter::make(__('dashboard/categories.datatable.filter.category-name.label'), 'category_name')
                ->config([
                    'placeholder' => __('dashboard/categories.datatable.filter.category-name.placeholder'),
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('categories.name', 'like', '%'.$value.'%');
                }),
        ];
    }

    public function bulkActions(): array
    {
        return [
            'deleteSelected' => __('dashboard/global.bulk-action.delete'),
        ];
    }

    public function deleteSelected()
    {
        Category::whereIn('id', $this->getSelected())->delete();
    }

    public function builder(): Builder
    {
        return Category::query()
            ->latest('categories.created_at');
    }

    public function columns(): array
    {
        return [
            Column::make(__('dashboard/categories.datatable.column.name'), 'name')
                ->secondaryHeaderFilter('category_name'),

            Column::make(__('dashboard/categories.datatable.column.action'))
                ->label(function ($row) {
                    return view('datatable.components.shared.column.category-action-column', ['id' => $row->id]);
                }),
        ];
    }
}
