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
    public function view(User $user,  Car $car): bool
    {
        if ($car->owner->user_id == $user->id) return true;
        //dd($car->owner->user_id, " == ", $user->id);
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
    public function update(User $user, Car $car): bool
    {
        if ($car->owner->user_id == $user->id || $user->type == 3) return true;
        else return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Car $car): bool
    {
        if ($car->owner->user_id == $user->id || $user->type == 3) return true;
        else return false;
    }
}
