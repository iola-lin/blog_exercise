<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Article' => 'App\Policies\ArticlePolicy',
        'App\Tag' => 'App\Policies\TagPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // FIXME: Resource Gate 可寫可不寫欸??
        Gate::resource('articles', 'App\Policies\ArticlePolicy');
        Gate::resource('tags', 'App\Policies\TagPolicy');

    }
}
