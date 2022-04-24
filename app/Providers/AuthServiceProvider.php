<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        \App\Models\Post::class => \App\Policies\PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define('home', function($user) {
            return $user && $user->id === 1;
        });
        //Gate chay truoc , sau do moi den policy , policy dung cho tung model
        Gate::before(function ($user) {
            if($user->id === 1) {
                return false;
            }
        });
    }
}
