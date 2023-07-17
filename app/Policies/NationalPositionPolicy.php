<?php

namespace App\Policies;

use App\Models\NationalPosition;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NationalPositionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if($user->hasPermissionTo('View Positions')){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\NationalPosition  $nationalPosition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, NationalPosition $nationalPosition)
    {
        if($user->hasPermissionTo('View Positions')){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if($user->hasPermissionTo('Create Positions')){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\NationalPosition  $nationalPosition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, NationalPosition $nationalPosition)
    {
        if($user->hasPermissionTo('Update Positions')){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\NationalPosition  $nationalPosition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, NationalPosition $nationalPosition)
    {
        if($user->hasPermissionTo('Delete Positions')){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\NationalPosition  $nationalPosition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, NationalPosition $nationalPosition)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\NationalPosition  $nationalPosition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, NationalPosition $nationalPosition)
    {
        //
    }
}
