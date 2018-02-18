<?php

namespace Inside\Services;

use Illuminate\Http\Request;
use Inside\Services\UsuarioLogadoService;
use Inside\Domain\VendasUnidadesColetas\VendasUnidadesColetas;
use Carbon\Carbon;

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
        $dataInicio = $request->exists('data_inicio')? $request->only('data_inicio') : Carbon::now()->copy()->subMonth(1)->hour(0)->minute(0)->second(0);
        $dataFim = $request->exists('data_fim')? $request->only('data_fim') : Carbon::now()->copy()->hour(23)->minute(59)->second(59);

        $unidadesColetasTotalizadores = $this->vendasUnidadesColetas->get($dataInicio, $dataFim, $user);

        return $unidadesColetasTotalizadores;
    }
}
