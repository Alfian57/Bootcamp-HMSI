<?php

namespace App\Livewire\Tables;

use App\Enums\Gender;
use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class UsersTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchStatus(false);
        $this->setFiltersVisibilityStatus(false);
        $this->setSortingDisabled();
        $this->setAdditionalSelects(['users.id as id', 'users.photo_profile as photo_profile']);
    }

    public function filters(): array
    {
        return [
            TextFilter::make(__('dashboard/users.datatable.filter.user-name.label'), 'user_name')
                ->config([
                    'placeholder' => __('dashboard/users.datatable.filter.user-name.placeholder'),
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('users.name', 'like', '%'.$value.'%');
                }),

            TextFilter::make(__('dashboard/users.datatable.filter.user-email.label'), 'user_email')
                ->config([
                    'placeholder' => __('dashboard/users.datatable.filter.user-email.placeholder'),
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('users.email', 'like', '%'.$value.'%');
                }),

            SelectFilter::make(__('dashboard/users.datatable.filter.user-gender.label'), 'user_gender')
                ->options([
                    '' => __('dashboard/users.datatable.filter.user-gender.items.all'),
                    Gender::MALE->value => __('dashboard/users.datatable.filter.user-gender.items.male'),
                    Gender::FEMALE->value => __('dashboard/users.datatable.filter.user-gender.items.female'),
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('users.gender', $value);
                }),

            SelectFilter::make(__('dashboard/users.datatable.filter.user-is-admin.label'), 'is_admin')
                ->options([
                    '' => __('dashboard/users.datatable.filter.user-is-admin.items.all'),
                    true => __('dashboard/users.datatable.filter.user-is-admin.items.admin'),
                    false => __('dashboard/users.datatable.filter.user-is-admin.items.buyer'),
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('users.is_admin', $value);
                }),
        ];
    }

    public function builder(): Builder
    {
        return User::query()
            ->latest('users.created_at');
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
        User::whereIn('id', $this->getSelected())->get()->each(function ($user) {
            if ($user->photo_profile) {
                Storage::delete($user->photo_profile);
            }
        });

        User::query()
            ->whereIn('id', $this->getSelected())
            ->whereNot('id', auth()->user()->id)
            ->delete();
    }

    public function exportSelected()
    {
        $fileName = 'users_'.date('Y-m-d_H-i-s').'.xlsx';

        return Excel::download(new UsersExport($this->getSelected()), $fileName);
    }

    public function columns(): array
    {
        return [
            Column::make(__('dashboard/users.datatable.column.name'), 'name')
                ->secondaryHeaderFilter('user_name'),

            Column::make(__('dashboard/users.datatable.column.email'), 'email')
                ->secondaryHeaderFilter('user_email')
                ->collapseOnMobile(),

            Column::make(__('dashboard/users.datatable.column.gender'), 'gender')
                ->format(fn ($value) => $this->displayGender($value))
                ->secondaryHeaderFilter('user_gender')
                ->collapseOnMobile(),

            ImageColumn::make(__('dashboard/users.datatable.column.photo-profile'), 'photo_profile')
                ->location(function ($row) {
                    if ($row->photo_profile) {
                        return asset('storage/'.$row->photo_profile);
                    }

                    return asset('assets/static/images/avatar.jpg');
                })
                ->attributes(fn ($row) => [
                    'class' => 'text-danger font-weight-bold',
                    'alt' => __('dashboard/global.image-error'),
                    'style' => 'width: 50px;',
                ])
                ->collapseOnTablet(),

            BooleanColumn::make(__('dashboard/users.datatable.column.admin'), 'is_admin')
                ->secondaryHeaderFilter('is_admin'),

            Column::make(__('dashboard/users.datatable.column.date-of-birth'), 'date_of_birth')
                ->collapseAlways(),

            Column::make(__('dashboard/users.datatable.column.phone-number'), 'phone_number')
                ->collapseAlways(),

            Column::make(__('dashboard/users.datatable.column.last-login'), 'last_login')
                ->format(fn ($value) => $value ? $value : 'Belum pernah login')
                ->collapseAlways(),

            Column::make(__('dashboard/users.datatable.column.action'))
                ->label(function ($row) {
                    return view('datatable.components.shared.column.user-action-column', ['id' => $row->id]);
                }),
        ];
    }

    private function displayGender($value): string
    {
        if ($value == Gender::MALE->value) {
            return __('enum.gender.male');
        } elseif ($value == Gender::FEMALE->value) {
            return __('enum.gender.female');
        }

        return '';
    }
}
