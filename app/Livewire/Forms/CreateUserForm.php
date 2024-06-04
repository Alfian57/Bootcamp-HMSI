<?php

namespace App\Livewire\Forms;

use App\Enums\Gender;
use Illuminate\Validation\Rule;
use Livewire\Form;

class CreateUserForm extends Form
{
    public $name = '';

    public $email = '';

    public $password = '';

    public $password_confirmation = '';

    public $gender = '';

    public $date_of_birth = '';

    public $phone_number = '';

    public $photo_profile = '';

    public $is_active = true;

    public $is_admin = false;

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['nullable', 'string', 'min:8', 'same:password_confirmation'],
            'gender' => ['required', Rule::in(Gender::MALE->value, Gender::FEMALE->value)],
            'date_of_birth' => ['required', 'date'],
            'phone_number' => ['required', 'string', 'max:25'],
            'photo_profile' => ['nullable', 'string'],
            'is_active' => ['required', 'boolean'],
            'is_admin' => ['required', 'boolean'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('dashboard/users.form.name.attribute'),
            'email' => __('dashboard/users.form.email.attribute'),
            'password' => __('dashboard/users.form.password.attribute'),
            'password_confirmation' => __('dashboard/users.form.password-confirmation.attribute'),
            'gender' => __('dashboard/users.form.gender.attribute'),
            'date_of_birth' => __('dashboard/users.form.date-of-birth.attribute'),
            'phone_number' => __('dashboard/users.form.phone-number.attribute'),
            'photo_profile' => __('dashboard/users.form.photo-profile.attribute'),
            'is_active' => __('dashboard/users.form.is-active.attribute'),
            'is_admin' => __('dashboard/users.form.is-admin.attribute'),
        ];
    }
}
