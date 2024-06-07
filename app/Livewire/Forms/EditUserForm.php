<?php

namespace App\Livewire\Forms;

use App\Enums\Gender;
use Illuminate\Validation\Rule;
use Livewire\Form;

class EditUserForm extends Form
{
    public string $id;

    public string $name = '';

    public string $email = '';

    public string $gender = '';

    public string $date_of_birth = '';

    public string $phone_number = '';

    public bool $is_active = false;

    public bool $is_admin = false;

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->id)],
            'gender' => ['required', Rule::in(Gender::MALE->value, Gender::FEMALE->value)],
            'date_of_birth' => ['required', 'date'],
            'phone_number' => ['required', 'string', 'max:25'],
            'is_active' => ['required', 'boolean'],
            'is_admin' => ['required', 'boolean'],
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'name' => __('dashboard/users.form.name.attribute'),
            'email' => __('dashboard/users.form.email.attribute'),
            'gender' => __('dashboard/users.form.gender.attribute'),
            'date_of_birth' => __('dashboard/users.form.date-of-birth.attribute'),
            'phone_number' => __('dashboard/users.form.phone-number.attribute'),
            'is_active' => __('dashboard/users.form.is-active.attribute'),
            'is_admin' => __('dashboard/users.form.is-admin.attribute'),
        ];
    }
}
