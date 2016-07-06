<?php

namespace Nht\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // User::class => UserPolicy::class,
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        // $this->registerPolicies($gate);
    }
}
