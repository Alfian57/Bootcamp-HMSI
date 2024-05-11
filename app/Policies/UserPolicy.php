<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function delete(User $user, User $model): bool
    {
        if ($user->id === $model->id) {
            return false;
        }

        return true;
    }
}
