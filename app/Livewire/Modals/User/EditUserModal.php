<?php

namespace App\Livewire\Modals\User;

use App\Enums\Gender;
use App\Livewire\Forms\EditUserForm;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class EditUserModal extends Component
{
    public EditUserForm $form;

    public User $user;

    public array $genders;

    public array $roles;

    public array $activeOptions;

    public function mount(User $user)
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
    }

    #[On('set-user-edit-modal')]
    public function setUser(string $id)
    {
        $user = User::find($id);
        $this->user = $user;

        $this->form->id = $user->id;
        $this->form->name = $user->name;
        $this->form->email = $user->email;
        $this->form->date_of_birth = $user->date_of_birth;
        $this->form->phone_number = $user->phone_number;
        $this->form->gender = $user->gender;
        $this->form->is_active = $user->is_active;
        $this->form->is_admin = $user->is_admin;
    }

    public function edit()
    {
        $this->form->validate();

        $this->user->update($this->form->all());
        session()->flash('message', __('dashboard/users.edit.success-message'));

        return $this->redirect(route('dashboard.users.index'));
    }

    public function render()
    {
        return view('dashboard.components.livewire.modals.user.edit-user-modal');
    }
}
