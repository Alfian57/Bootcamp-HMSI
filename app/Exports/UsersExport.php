<?php

namespace App\Exports;

use App\Enums\Gender;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    private array $userIds;

    public function __construct(array $userIds)
    {
        $this->userIds = $userIds;
    }

    public function headings(): array
    {
        return ['Nama', 'Email', 'Jenis Kelamin', 'Tanggal Lahir', 'Nomor Telepon', 'Role', 'Dibuat Pada'];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::query()
            ->whereIn('id', $this->userIds)
            ->select('name', 'email', 'gender', 'date_of_birth', 'phone_number', 'is_admin', 'created_at')
            ->get()
            ->each(function ($user) {
                $user->gender = $this->displayGender($user->gender);
                $user->is_admin = $user->is_admin ? 'Admin' : 'Pelanggan';
                $user->created_at = $user->created_at->format('Y-m-d');
            });
    }

    private function displayGender($gender)
    {
        $genders = [
            Gender::MALE->value => 'Laki-laki',
            Gender::FEMALE->value => 'Perempuan',
        ];

        return $genders[$gender];
    }
}
