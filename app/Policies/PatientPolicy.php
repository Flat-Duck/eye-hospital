<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Auth\Access\HandlesAuthorization;

class PatientPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the patient can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list patients');
    }

    /**
     * Determine whether the patient can view the model.
     */
    public function view(User $user, Patient $model): bool
    {
        return $user->hasPermissionTo('view patients');
    }

    /**
     * Determine whether the patient can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create patients');
    }

    /**
     * Determine whether the patient can update the model.
     */
    public function update(User $user, Patient $model): bool
    {
        return $user->hasPermissionTo('update patients');
    }

    /**
     * Determine whether the patient can delete the model.
     */
    public function delete(User $user, Patient $model): bool
    {
        return $user->hasPermissionTo('delete patients');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete patients');
    }

    /**
     * Determine whether the patient can restore the model.
     */
    public function restore(User $user, Patient $model): bool
    {
        return false;
    }

    /**
     * Determine whether the patient can permanently delete the model.
     */
    public function forceDelete(User $user, Patient $model): bool
    {
        return false;
    }
}
