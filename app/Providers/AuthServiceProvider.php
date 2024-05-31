<?php

namespace App\Providers;

use App\Policies\MethodPolicy;
use App\Policies\PrestatairePolicy;
use App\Policies\RolePolicy;
use App\Policies\SponsorPolicy;
use App\Policies\StatuPolicy;
use App\Policies\TeamPolicy;
use App\Policies\TypePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        UserPolicy::class,
        TeamPolicy::class,
        StatuPolicy::class,
        RolePolicy::class,
        TypePolicy::class,
        SponsorPolicy::class,
        PrestatairePolicy::class,
        MethodPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
