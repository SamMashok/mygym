<?php

namespace App\Policies;

use App\Models\User;
use App\Models\subscription;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriptionPolicy
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
       return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\subscription  $subscription
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, subscription $subscription)
    {
        return $user->is($subscription->user) || $user->isAdmin();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\subscription  $subscription
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, subscription $subscription)
    {
        return false;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\subscription  $subscription
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, subscription $subscription)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\subscription  $subscription
     * @return \Illuminate\Auth\Access\Response|bool
     */

}
