<?php

namespace App\Livewire\Modals\User;

use App\Enums\Gender;
use App\Livewire\Forms\CreateUserForm;
use App\Mail\UserRegistrationMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUserModal extends Component
{
    use WithFileUploads;

    public CreateUserForm $form;

    public array $genders;

    public array $roles;

    public array $activeOptions;

    public bool $showPassword = false;

    public function mount()
    {
        $this->genders = [
            Gender::MALE->value => __('enum.gender.male'),
            Gender::FEMALE->value => __('enum.gender.female'),
        ];

        $this->roles = [
            true => __('dashboard/users.form.is-admin.items.admin'),
            false => __('dashboard/users.form.is-admin.items.buyer'),
        ];

        $this->activeOptions = [
            true => __('dashboard/users.form.is-active.items.active'),
            false => __('dashboard/users.form.is-active.items.inactive'),
        ];

        $this->form->gender = $this->genders[Gender::MALE->value];
        $this->form->is_admin = $this->roles[true];
        $this->form->is_active = $this->activeOptions[true];
    }

    public function save()
    {
        $this->form->validate();

        $data = $this->form->all();
        if ($this->form->photo_profile) {
            // $data['photo_profile'] = $this->form->photo_profile->store('photo_profile');
        }
        if (! isset($data['password'])) {
            $data['password'] = str::random(10);
        }

        $user = User::create($data);
        Mail::to($user->email)->queue(new UserRegistrationMail(
            $user->name,
            $user->email,
            $data['password'],
        ));

        toast(__('dashboard/users.create.success-message'), 'success');

        return redirect()->route('dashboard.users.index');
    }

    public function toggleShowPassword()
    {
        $this->showPassword = ! $this->showPassword;
    }

    public function render()
    {
        return view('dashboard.components.livewire.modals.user.create-user-modal');
    }
}
