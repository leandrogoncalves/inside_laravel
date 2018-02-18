<?php

namespace Inside\Services;

use Illuminate\Http\Request;
use Inside\Domain\VendasUnidadesColetas\ComVenda\UnidadesColetaComVendaDetail;
use Inside\Services\UsuarioLogadoService;
use Inside\Domain\VendasUnidadesColetas\VendasUnidadesColetas;

class PerformanceService
{
    private $usuarioLogadoService;
    private $vendasUnidadesColetas;
    private $unidadesColetaComVendaDetail;

    public function __construct(UsuarioLogadoService $usuarioLogadoService,
                                VendasUnidadesColetas $vendasUnidadesColetas,
                                UnidadesColetaComVendaDetail $unidadesColetaComVendaDetail
    )
    {
        $this->usuarioLogadoService = $usuarioLogadoService;
        $this->vendasUnidadesColetas = $vendasUnidadesColetas;
        $this->unidadesColetaComVendaDetail = $unidadesColetaComVendaDetail;
    }

    public function getData(Request $request)
    {
        $user = $this->usuarioLogadoService->getUsuarioLogadoData($request);
        $this->vendasUnidadesColetas->get($user);

        $teste = $this->unidadesColetaComVendaDetail->get($user);

    }
}
