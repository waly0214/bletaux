<?php

namespace App\Policies;

use App\Models\Newsletter;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsletterPolicy
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
        if($user->hasPermissionTo('View Newsletters')){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\NewsletterPosition  $newsletterPosition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        if($user->hasPermissionTo('View Newsletters')){
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
        if($user->hasPermissionTo('Create Newsletters')){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\NewsletterPosition  $newsletterPosition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        if($user->hasPermissionTo('Update Newsletters')){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\NewsletterPosition  $newsletterPosition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        if($user->hasPermissionTo('Delete Newsletters')){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\NewsletterPosition  $newsletterPosition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Newsletter $newsletter)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\NewsletterPosition  $newsletterPosition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Newsletter $newsletter)
    {
        //
    }
}
