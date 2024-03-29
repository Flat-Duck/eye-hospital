<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Hospital;
use Illuminate\Auth\Access\HandlesAuthorization;

class HospitalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the hospital can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list hospitals');
    }

    /**
     * Determine whether the hospital can view the model.
     */
    public function view(User $user, Hospital $model): bool
    {
        return $user->hasPermissionTo('view hospitals');
    }

    /**
     * Determine whether the hospital can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create hospitals');
    }

    /**
     * Determine whether the hospital can update the model.
     */
    public function update(User $user, Hospital $model): bool
    {
        return $user->hasPermissionTo('update hospitals');
    }

    /**
     * Determine whether the hospital can delete the model.
     */
    public function delete(User $user, Hospital $model): bool
    {
        return $user->hasPermissionTo('delete hospitals');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete hospitals');
    }

    /**
     * Determine whether the hospital can restore the model.
     */
    public function restore(User $user, Hospital $model): bool
    {
        return false;
    }

    /**
     * Determine whether the hospital can permanently delete the model.
     */
    public function forceDelete(User $user, Hospital $model): bool
    {
        return false;
    }
}
