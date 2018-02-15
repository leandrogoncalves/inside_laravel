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
        $this->app->bind(\Inside\Repositories\Contracts\LaboratorioRepository::class, \Inside\Repositories\LaboratorioRepositoryEloquent::class);
        $this->app->bind(\Inside\Repositories\Contracts\ExecutivoPsyRepository::class, \Inside\Repositories\ExecutivoPsyRepositoryEloquent::class);
        $this->app->bind(\Inside\Repositories\Contracts\ExecutivoPardiniRepository::class, \Inside\Repositories\ExecutivoPardiniRepositoryEloquent::class);
        $this->app->bind(\Inside\Repositories\Contracts\FormularioRepository::class, \Inside\Repositories\FormularioRepositoryEloquent::class);
        //:end-bindings:
    }
}
