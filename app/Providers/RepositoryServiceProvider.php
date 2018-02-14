<?php

namespace Inside\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\Contracts\LaboratorioRepository::class, \App\Repositories\LaboratorioRepositoryEloquent::class);
        //:end-bindings:
    }
}
