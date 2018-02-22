<?php

namespace Inside\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'Inside\Model' => 'Inside\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $userService = \App::make('Inside\Services\UsuarioLogadoService');
        $this->registerPolicies();
        Gate::define('ver-acessos', function($user, Request $request ) use ($userService) {
            $user = $userService->getUsuarioLogadoData($request);
            return $user->isNotExecutivo();
        });

    }
}
