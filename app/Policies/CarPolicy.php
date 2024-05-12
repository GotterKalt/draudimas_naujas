<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\User;
use App\Models\Owner;

class CarPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Возвращает true, так как это необходимо только для проверки доступа к методу view
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Owner $owner, Car $car): bool
    {
        if ($user->type == 1 && $car->owner_id == $owner->id) return true;
        elseif ($user->type == 2 && $car->owner_id == $owner->id || $user->type == 3) return true;
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
    public function update(User $user, Owner $owner, Car $car): bool
    {
        if ($user->type == 1 && $car->owner_id == $owner->id) return true;
        elseif ($user->type == 2 && $car->owner_id == $owner->id || $user->type == 3) return true;
        else return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Owner $owner, Car $car): bool
    {
        if ($user->type == 1 && $car->owner_id == $owner->id) return true;
        elseif ($user->type == 2 && $car->owner_id == $owner->id || $user->type == 3) return true;
        else return false;
    }
}
