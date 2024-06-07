<?php

namespace App\Livewire\Pages;

use App\Livewire\Forms\ChangePasswordForm;
use App\Livewire\Forms\UpdatePhotoForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Setting extends Component
{
    use WithFileUploads;

    public ChangePasswordForm $changePasswordForm;

    public UpdatePhotoForm $updatePhotoForm;

    public bool $isImageNew = false;

    public function toogleIsImageNew()
    {
        $this->isImageNew = ! $this->isImageNew;
    }

    public function updatePhoto()
    {
        /** @var \App\Models\User $user * */
        $user = Auth::user();

        $this->updatePhotoForm->validate();
        $user->update([
            'photo_profile' => $this->updatePhotoForm->photo_profile->store('profiles'),
        ]);

        $this->updatePhotoForm->reset();
        $this->toogleIsImageNew();
        session()->flash('message', __('dashboard/setting.update-photo-form.success-message'));
        $this->redirect(route('dashboard.setting'), true);
    }

    public function changePassword()
    {
        /** @var \App\Models\User $user * */
        $user = Auth::user();

        $this->changePasswordForm->validate();
        if (Hash::check($this->changePasswordForm->old_password, $user->password)) {
            $user->update([
                'password' => $this->changePasswordForm->new_password,
            ]);

            session()->flash('message', __('dashboard/setting.change-password-form.success-message'));
            $this->changePasswordForm->reset();
        } else {
            session()->flash('error-message', __('dashboard/setting.change-password-form.old-password-incorrect'));
        }

        $this->redirect(route('dashboard.setting'), true);
    }

    public function render()
    {
        return view('dashboard.pages.setting.index');
    }
}
