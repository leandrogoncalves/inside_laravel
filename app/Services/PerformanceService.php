<?php

namespace Inside\Services;

use Illuminate\Http\Request;
use Inside\Domain\PrecoMedio\PrecoMedio;
use Inside\Domain\VendasUnidadesColetas\ComVenda\UnidadesColetaComVendaDetail;
use Inside\Services\UsuarioLogadoService;
use Inside\Domain\VendasUnidadesColetas\VendasUnidadesColetas;
use Carbon\Carbon;

class PerformanceService
{
    private $usuarioLogadoService;
    private $vendasUnidadesColetas;
    private $unidadesColetaComVendaDetail;
    private $precoMedio;

    public function __construct(UsuarioLogadoService $usuarioLogadoService,
                                VendasUnidadesColetas $vendasUnidadesColetas,
                                UnidadesColetaComVendaDetail $unidadesColetaComVendaDetail,
                                PrecoMedio $precoMedio
    )
    {
        $this->usuarioLogadoService = $usuarioLogadoService;
        $this->vendasUnidadesColetas = $vendasUnidadesColetas;
        $this->unidadesColetaComVendaDetail = $unidadesColetaComVendaDetail;
        $this->precoMedio = $precoMedio;
    }

    public function getData(Request $request)
    {
        $user = $this->usuarioLogadoService->getUsuarioLogadoData($request);
        $dataInicio = $request->exists('data_inicio')
                    ? Carbon::createFromFormat('Y-m-d', $request->input('data_inicio'))->hour(0)->minute(0)->second(0)
                    : Carbon::now()->copy()->subMonth(1)->hour(0)->minute(0)->second(0);
        $dataFim = $request->exists('data_fim')
                 ? Carbon::createFromFormat('Y-m-d', $request->input('data_fim'))->hour(23)->minute(59)->second(59)
                 : Carbon::now()->copy()->hour(23)->minute(59)->second(59);
        $existsDate = $request->exists('data_inicio');

        $unidadesColetasTotalizadores = $this->vendasUnidadesColetas->getTotais($dataInicio, $dataFim, $user, !$existsDate);
        $unidadesColetasTotalizadoresDetail = $this->vendasUnidadesColetas->getTotaisDetail($dataInicio, $dataFim, $user, !$existsDate);

        $unidadesColetasTotalizadores->toBase()->merge($unidadesColetasTotalizadoresDetail);

        $precoMedio = $this->precoMedio->getPrecoMedio($user);

        $unidadesColetasTotalizadores->put('precoMedio', $precoMedio);
        $unidadesColetasTotalizadores->put('unidadesColetasDetalhes', $unidadesColetasTotalizadoresDetail['unidadesColetasDetalhes']);

        return $unidadesColetasTotalizadores;
    }
}
