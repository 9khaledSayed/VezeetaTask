<?php

namespace App\Providers;

use App\Customer;
use App\Doctor;
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

        Gate::define('update-doctor-information', function (){
            return auth()->guard('doctor')->check();
        });

        Gate::define('make-reservation', function (){
            return auth()->guard('customer')->check();
        });

        //
    }
}
