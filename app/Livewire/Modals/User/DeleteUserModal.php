<?php

namespace App\Livewire\Modals\User;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class DeleteUserModal extends Component
{
    public User $user;

    #[On('set-user-delete-modal')]
    public function setUser(string $id)
    {
        $this->user = User::find($id);
    }

    public function delete()
    {
        Gate::authorize('delete', $this->user);

        if ($this->user->photo_profile) {
            Storage::delete($this->user->photo_profile);
        }
        $this->user->delete();

        session()->flash('message', __('dashboard/users.delete.success-message'));

        return $this->redirect(route('dashboard.users.index'), true);
    }

    public function render()
    {
        return view('dashboard.components.livewire.modals.user.delete-user-modal');
    }
}
