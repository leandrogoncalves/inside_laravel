<?php

namespace Inside\Services;

use Illuminate\Http\Request;
use Inside\Domain\PrecoMedio\PrecoMedio;
use Inside\Domain\VendasUnidadesColetas\ComVenda\UnidadesColetaComVendaDetail;
use Inside\Services\UsuarioLogadoService;
use Inside\Domain\VendasUnidadesColetas\VendasUnidadesColetas;
use Inside\Domain\Performance\PerformanceLaboratorios;
use Carbon\Carbon;

class PerformanceService
{
    private $usuarioLogadoService;
    private $vendasUnidadesColetas;
    private $unidadesColetaComVendaDetail;
    private $precoMedio;
    private $performanceLaboratorios;


    public function __construct(UsuarioLogadoService $usuarioLogadoService,
                                VendasUnidadesColetas $vendasUnidadesColetas,
                                UnidadesColetaComVendaDetail $unidadesColetaComVendaDetail,
                                PrecoMedio $precoMedio,
                                PerformanceLaboratorios $performanceLaboratorios
    )
    {
        $this->usuarioLogadoService = $usuarioLogadoService;
        $this->vendasUnidadesColetas = $vendasUnidadesColetas;
        $this->unidadesColetaComVendaDetail = $unidadesColetaComVendaDetail;
        $this->precoMedio = $precoMedio;
        $this->performanceLaboratorios = $performanceLaboratorios;

    }

    public function getData(Request $request)
    {
        $user = $this->usuarioLogadoService->getUsuarioLogadoData($request);
        $dates = $this->getDatesOfThePeriods($request);
        $dataInicio = $dates['dataInicio'];
        $dataFim = $dates['dataFim'];

        $existsDate = $request->exists('data_inicio');

        $unidadesColetasTotalizadores = $this->vendasUnidadesColetas->getTotais($dataInicio, $dataFim, $user, !$existsDate);

        if ($existsDate == true) {
            $unidadesColetasTotalizadoresDetail = $this->performanceLaboratorios->get($dataInicio, $dataFim, $user);
        } else {
            $unidadesColetasTotalizadoresDetail = $this->vendasUnidadesColetas->getTotalComVendaDetail($dataInicio, $dataFim, $user, !$existsDate);
        }

        $nuncaVenderamDetail = $this->vendasUnidadesColetas->getNuncaVenderamDetail($user);
        $labsSemVendaDetail = $this->vendasUnidadesColetas->getLabsSemVendaDetail($user);
        $movidosExclusaoDetail = $this->vendasUnidadesColetas->getMovidosExclusaoDetail($user);

        $unidadesColetasTotalizadores->put('unidadesColetasDetalhes', $unidadesColetasTotalizadoresDetail);
        $unidadesColetasTotalizadores->put('nuncaVenderamDetail', $nuncaVenderamDetail);
        $unidadesColetasTotalizadores->put('movidosExclusaoDetail', $movidosExclusaoDetail);
        $unidadesColetasTotalizadores->put('labsSemVendaDetail', $labsSemVendaDetail);

        $precoMedio = $this->precoMedio->getPrecoMedio($user);

        $unidadesColetasTotalizadores->put('precoMedio', $precoMedio);

        return $unidadesColetasTotalizadores;
    }

    private function getDatesOfThePeriods(Request $request)
    {

        if ($request->exists('data_inicio')) {
            $dataInicio = Carbon::createFromFormat('Y-m-d', $request->input('data_inicio'))->hour(0)->minute(0)->second(0);
        } else {
            $dataInicio = Carbon::now()->copy()->subMonth(1)->hour(0)->minute(0)->second(0);
        }

        if ($request->exists('data_fim')) {
            $dataFim = Carbon::createFromFormat('Y-m-d', $request->input('data_fim'))->hour(23)->minute(59)->second(59);
        } else {
            $dataFim = Carbon::now()->copy()->hour(23)->minute(59)->second(59);
        }

        return ['dataInicio' => $dataInicio, 'dataFim' => $dataFim];
    }
}
