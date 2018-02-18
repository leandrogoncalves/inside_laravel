<?php

namespace Inside\Services;

use Illuminate\Http\Request;
use Inside\Services\UsuarioLogadoService;
use Inside\Domain\VendasUnidadesColetas\VendasUnidadesColetas;

class PerformanceService
{
    private $usuarioLogadoService;
    private $vendasUnidadesColetas;

    public function __construct(UsuarioLogadoService $usuarioLogadoService, VendasUnidadesColetas $vendasUnidadesColetas)
    {
        $this->usuarioLogadoService = $usuarioLogadoService;
        $this->vendasUnidadesColetas = $vendasUnidadesColetas;
    }

    public function getData(Request $request)
    {
        $user = $this->usuarioLogadoService->getUsuarioLogadoData($request);
        $this->vendasUnidadesColetas->get($user);
        return 'ola mundo';
    }
}
