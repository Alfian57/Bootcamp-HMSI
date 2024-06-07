<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class ChangePasswordForm extends Form
{
    public string $new_password = '';

    public string $password_confirmation = '';

    public string $old_password = '';

    public function rules(): array
    {
        return [
            'new_password' => ['required', 'string', 'min:8', 'same:password_confirmation'],
            'old_password' => ['required', 'string'],
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'new_password' => __('dashboard/setting.change-password-form.new-password.attribute'),
            'old_password' => __('dashboard/setting.change-password-form.old-password.attribute'),
        ];
    }
}
