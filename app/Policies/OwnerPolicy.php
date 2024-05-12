<?php

namespace App\Policies;

use App\Models\Owner;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OwnerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Owner $owner): bool
    {
        if($owner->user_id == $user->id && $user->type == 1){
            return true;
        }
        elseif ($user->type == 2 || $user->type == 3) return true;
        else return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Owner $owner): bool
    {
        if($owner->user_id == $user->id && $user->type == 1 || $user->type == 3){
            return true;
        }
        if($owner->user_id == $user->id && $user->type == 2){
            return true;
        }
        else return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Owner $owner): bool
    {
        if($owner->user_id == $user->id && $user->type == 1 || $user->type == 3){
            return true;
        }
        if($owner->user_id == $user->id && $user->type == 2){
            return true;
        }
        else return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Owner $owner): bool
    {
        return $user->type==2;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Owner $owner): bool
    {
        return $user->type==2;
    }
}
