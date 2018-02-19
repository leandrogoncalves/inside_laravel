<?php

namespace Inside\Services;

use Illuminate\Http\Request;
use Inside\Services\UsuarioLogadoService;
use Inside\Domain\SolicitacoesExames\TotalExames;
use Inside\Domain\PrecoMedio\PrecoMedio;
use Carbon\Carbon;
use Inside\Transformers\TotalExamesSolicitadosTransformer;
use Inside\Domain\VendasUnidadesColetas\VendasUnidadesColetas;

class HomeService
{
    private $usuarioLogadoService;
    private $totalExames;
    private $precoMedio;

    public function __construct(UsuarioLogadoService $usuarioLogadoService, TotalExames $totalExames, PrecoMedio $precoMedio, VendasUnidadesColetas $vendasUnidadesColetas)
    {
        $this->usuarioLogadoService = $usuarioLogadoService;
        $this->totalExames = $totalExames;
        $this->precoMedio = $precoMedio;
        $this->vendasUnidadesColetas = $vendasUnidadesColetas;
    }

    public function getData(Request $request)
    {
        $user = $this->usuarioLogadoService->getUsuarioLogadoData($request);
        $dates = $this->getExamesDaysDate();

        $data = collect([]);

        $periodOne = $this->totalExames->getTotalExamesSolicitados($dates["startPeriodOne"], $dates["finishPeriodOne"], $user);
        $periodTwo = $this->totalExames->getTotalExamesSolicitados($dates["startPeriodTwo"], $dates["finishPeriodTwo"], $user);
        $periodThree = $this->totalExames->getTotalExamesSolicitados($dates["startPeriodThree"], $dates["finishPeriodThree"], $user);

        $precoMedio = $this->precoMedio->getPrecoMedio($user);

        $dataInicio = $request->exists('data_inicio')
            ? Carbon::createFromFormat('Y-m-d', $request->input('data_inicio'))->hour(0)->minute(0)->second(0)
            : Carbon::now()->copy()->subMonth(1)->hour(0)->minute(0)->second(0);
        $dataFim = $request->exists('data_fim')
            ? Carbon::createFromFormat('Y-m-d', $request->input('data_fim'))->hour(23)->minute(59)->second(59)
            : Carbon::now()->copy()->hour(23)->minute(59)->second(59);
        $existsDate = $request->exists('data_inicio');

        $unidadesColetasTotalizadores = $this->vendasUnidadesColetas->getTotais($dataInicio, $dataFim, $user, !$existsDate);

        $data->put('periodo1', $periodOne);
        $data->put('periodo2', $periodTwo);
        $data->put('periodo3', $periodThree);

        $transformer = new TotalExamesSolicitadosTransformer();
        $data = $transformer->transform($data);

        return [
            'data' => $data,
            'precoMedio' => $precoMedio,
            'unidadesColetasComVenda' => $unidadesColetasTotalizadores['unidadesColetasComVenda'],
            'unidadesColetasSemVenda' => $unidadesColetasTotalizadores['unidadesColetasSemVenda'],
            'unidadesColetasNuncaVenderam' => $unidadesColetasTotalizadores['unidadesColetasNuncaVenderam'],
        ];
    }

    private function getExamesDaysDate()
    {
        $now = Carbon::now();
        //Data feita para testes:
        //$now = Carbon::createFromFormat("Y-m-d H:i:s", "2018-02-09 00:00:00");

        return collect([
            "startPeriodOne" => $now->copy()->addDays(0)->hour(0)->minute(0)->second(0),
            "finishPeriodOne" => $now->copy()->addDays(0)->hour(23)->minute(59)->second(59),
            "startPeriodTwo" => $now->copy()->addDays(-1)->hour(0)->minute(0)->second(0),
            "finishPeriodTwo" => $now->copy()->addDays(-1)->hour(23)->minute(59)->second(59),
            "startPeriodThree" => $now->copy()->addDays(-2)->hour(0)->minute(0)->second(0),
            "finishPeriodThree" => $now->copy()->addDays(-2)->hour(23)->minute(59)->second(59),
        ]);
    }
}
