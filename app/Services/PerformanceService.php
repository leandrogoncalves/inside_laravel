<?php

namespace Inside\Services;

use Illuminate\Http\Request;
use Inside\Services\UsuarioLogadoService;

class PerformanceService
{
    private $usuarioLogadoService;

    public function __construct(UsuarioLogadoService $usuarioLogadoService)
    {
        $this->usuarioLogadoService = $usuarioLogadoService;
    }

    public function getData(Request $request)
    {
        return 'ola mundo';
    }
}
