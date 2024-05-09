<?php

namespace App\Livewire;

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
        $this->setAdditionalSelects(['users.id as id', 'users.photo_profile as photo_profile']);
    }

    public function filters(): array
    {
        return [
            TextFilter::make('Nama Pengguna', 'user_name')
                ->config([
                    'placeholder' => 'Cari Pengguna',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('users.name', 'like', '%'.$value.'%');
                }),

            TextFilter::make('Email Pengguna', 'user_email')
                ->config([
                    'placeholder' => 'Cari Email',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('users.email', 'like', '%'.$value.'%');
                }),

            SelectFilter::make('Jenis Kelamin', 'user_gender')
                ->options([
                    '' => 'Pilih',
                    Gender::MALE->value => 'Lak-laki',
                    Gender::FEMALE->value => 'Perempuan',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('users.gender', $value);
                }),

            SelectFilter::make('Admin', 'is_admin')
                ->options([
                    '' => 'Pilih',
                    true => 'Admin',
                    false => 'Bukan Admin',
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

    public array $bulkActions = [
        'deleteSelected' => 'Hapus',
        'exportSelected' => 'Ekspor Excel',
    ];

    public function deleteSelected()
    {
        User::whereIn('id', $this->getSelected())->get()->each(function ($user) {
            if ($user->photo_profile) {
                Storage::delete($user->photo_profile);
            }
        });

        User::whereIn('id', $this->getSelected())->delete();
    }

    public function exportSelected()
    {
        $fileName = 'users_'.date('Y-m-d_H-i-s').'.xlsx';

        return Excel::download(new UsersExport($this->getSelected()), $fileName);
    }

    public function columns(): array
    {
        return [
            Column::make('Nama', 'name')
                ->sortable()
                ->secondaryHeaderFilter('user_name'),

            Column::make('Email', 'email')
                ->sortable()
                ->secondaryHeaderFilter('user_email')
                ->collapseOnMobile(),

            Column::make('Jenis Kelamin', 'gender')
                ->sortable()
                ->format(fn ($value) => $this->displayGender($value))
                ->secondaryHeaderFilter('user_gender')
                ->collapseOnMobile(),

            ImageColumn::make('Foto Profil', 'photo_profile')
                ->location(
                    fn ($row) => asset('storage/'.$row->photo_profile)
                )
                ->attributes(fn ($row) => [
                    'class' => 'text-danger font-weight-bold',
                    'alt' => 'Gambar rusak',
                    'style' => 'width: 50px;',
                ])
                ->collapseOnTablet(),

            BooleanColumn::make('Admin', 'is_admin')
                ->sortable()
                ->secondaryHeaderFilter('is_admin'),

            Column::make('Tanggal Lahir', 'date_of_birth')
                ->collapseAlways(),

            Column::make('No Telepon', 'phone_number')
                ->collapseAlways(),

            Column::make('Tanggal Terakir Login', 'last_login')
                ->format(fn ($value) => $value ? $value : 'Belum pernah login')
                ->collapseAlways(),

            Column::make('Aksi')
                ->label(function ($row) {
                    $deleteButton = view('datatable.components.shared.button.delete-button', [
                        'href' => route('dashboard.users.destroy', $row->id),
                    ]);

                    $editButton = view('datatable.components.shared.button.action-button', [
                        'href' => route('dashboard.users.edit', $row->id),
                        'class' => 'btn-warning',
                        'text' => 'Ubah',
                    ]);

                    return view('datatable.components.shared.action-container.index', [
                        'components' => [$deleteButton, $editButton],
                    ]);
                }),
        ];
    }

    private function displayGender($value): string
    {
        if ($value == Gender::MALE->value) {
            return 'Laki-laki';
        } elseif ($value == Gender::FEMALE->value) {
            return 'Perempuan';
        }

        return '';
    }
}
