<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Manage
        Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['superadmin','admin','author']);
        });

        // Edit
        Gate::define('edit-users', function($user){
            return $user->hasAnyRoles(['superadmin','admin','author']);
        });


        // Delete
        Gate::define('delete-users', function($user){
            return $user->hasAnyRoles(['superadmin','admin']);
        });

        // Gate::define('delete-users', function($user){
        //     return $user->hasRole('admin');
        // });
    }
}
