<?php

namespace App\Providers;
use App\Models\User;
use App\Models\Owner;
use App\Policies\OwnerPolicy;
use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Owner::class=>OwnerPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        Gate::define('edit_owner', function(User $user, Owner $owner){
            if($owner->user_id == $user->id && $user->type == 1 || $user->type == 3){
                return true;
            }
            elseif($owner->user_id == $user->id && $user->type == 2){
                return true;
            }
        });
        //Gate::define('delete_owner', function(User $user, Owner $owner){
        //    if($owner->user_id == $user->id && $user->type == 1|| $user->type == 3){
        //        return true;
        //    }
        //    elseif($owner->user_id == $user->id && $user->type == 2){
        //        return true;
        //    }

        //});
    }
}
