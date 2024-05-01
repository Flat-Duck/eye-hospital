<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Template;
use Illuminate\Auth\Access\HandlesAuthorization;

class TemplatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the template can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list templates');
    }

    /**
     * Determine whether the template can view the model.
     */
    public function view(User $user, Template $model): bool
    {
        return $user->hasPermissionTo('view templates');
    }

    /**
     * Determine whether the template can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create templates');
    }

    /**
     * Determine whether the template can update the model.
     */
    public function update(User $user, Template $model): bool
    {
        return $user->hasPermissionTo('update templates');
    }

    /**
     * Determine whether the template can delete the model.
     */
    public function delete(User $user, Template $model): bool
    {
        return $user->hasPermissionTo('delete templates');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete templates');
    }

    /**
     * Determine whether the template can restore the model.
     */
    public function restore(User $user, Template $model): bool
    {
        return false;
    }

    /**
     * Determine whether the template can permanently delete the model.
     */
    public function forceDelete(User $user, Template $model): bool
    {
        return false;
    }
}
