<?php

namespace App\Livewire\Form;

use Livewire\Component;

class ShowPasswordInput extends Component
{
    public bool $showPassword = false;

    public function toggleShowPassword()
    {
        $this->showPassword = ! $this->showPassword;
    }

    public function render()
    {
        return view('dashboard.components.shared.form.show-password-input');
    }
}
