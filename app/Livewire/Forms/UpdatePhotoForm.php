<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class UpdatePhotoForm extends Form
{
    public $photo_profile;

    public function rules()
    {
        return [
            'photo_profile' => ['required', 'image', 'max:1024'],
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'photo_profile' => __('dashboard/setting.update-photo-form.photo-profile.attribute'),
        ];
    }
}
