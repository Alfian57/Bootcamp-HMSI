<?php

namespace App\Livewire;

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

    public function columns(): array
    {
        return [
            Column::make(__('dashboard/categories.datatable.column.name'), 'name')
                ->sortable()
                ->secondaryHeaderFilter('category_name'),

            Column::make(__('dashboard/categories.datatable.column.action'))
                ->label(function ($row) {
                    $deleteButton = view('datatable.components.shared.button.delete-button', [
                        'href' => route('dashboard.categories.destroy', $row->id),
                    ]);

                    $editButton = view('datatable.components.shared.button.action-button', [
                        'href' => route('dashboard.categories.edit', $row->id),
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
