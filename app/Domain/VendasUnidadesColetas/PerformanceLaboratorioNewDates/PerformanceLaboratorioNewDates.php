<?php

namespace Inside\Domain\VendasUnidadesColetas\PerformanceLaboratorioNewDates;

use Inside\Repositories\Contracts\VendaOrigemRepository;
use Inside\Repositories\Contracts\PerformanceLaboratorioRepository;
use Carbon\Carbon;
use \DB;
use Illuminate\Database\Eloquent\Collection as DatabaseCollection;

class PerformanceLaboratorioNewDates
{

    private $vendaOrigemRepository;
    protected $performanceDataResults;

    public function __construct(VendaOrigemRepository $vendaOrigemRepository, PerformanceLaboratorioRepository $performanceLaboratorioRepository)
    {
        $this->vendaOrigemRepository = $vendaOrigemRepository;
        $this->performanceLaboratorioRepository = $performanceLaboratorioRepository;
        $this->performanceDataResults = collect([]);
    }

    public function getPsy(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        $newValuesPerformanceB = $this->getPerformanceLaboratoriosPsy($dataInicio, $dataFim, $idExecutivo);

        $differenceInDaysNegative = $dataFim->copy()->diffInDays($dataInicio);
        $differenceInDaysNegative = $differenceInDaysNegative * (-1);
        $dataInicioPeriodoA = $dataInicio->copy()->addDays(-1);
        $dataFimPeriodoA = $dataInicioPeriodoA->copy()->addDays($differenceInDaysNegative);

        $newValuesPerformanceA = $this->getPerformanceLaboratoriosPsy($dataInicioPeriodoA, $dataFimPeriodoA, $idExecutivo);
        $dadosBasicos = $this->getDadosBasicosPerformancePsy($idExecutivo);

        return $this->pushValues($dadosBasicos, $newValuesPerformanceB, $newValuesPerformanceA);
    }

    public function getPardini(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        $newValuesPerformanceB = $this->getPerformanceLaboratoriosPardini($dataInicio, $dataFim, $idExecutivo);

        $differenceInDaysNegative = $dataFim->copy()->diffInDays($dataInicio);
        $differenceInDaysNegative = $differenceInDaysNegative * (-1);
        $dataInicioPeriodoA = $dataInicio->copy()->addDays(-1);
        $dataFimPeriodoA = $dataInicioPeriodoA->copy()->addDays($differenceInDaysNegative);

        $newValuesPerformanceA = $this->getPerformanceLaboratoriosPardini($dataInicioPeriodoA, $dataFimPeriodoA, $idExecutivo);
        $dadosBasicos = $this->getDadosBasicosPerformancePardini($idExecutivo);

        return $this->pushValues($dadosBasicos, $newValuesPerformanceB, $newValuesPerformanceA);
    }

    public function getDadosBasicosPerformancePsy(array $idExecutivo)
    {
        return $this->performanceLaboratorioRepository->scopeQuery(function ($query) use ($idExecutivo) {
            return $query->whereIn('id_executivo_psy', $idExecutivo);
        })
        ->all([
            'nome_laboratorio',
            'cidade',
            'estado',
            'ativo',
            'id_executivo_psy',
            'id_executivo_pardini',
            'nome_executivo_psy',
            'nome_executivo_pardini',
            'valor_exame_clt',
            'valor_exame_cnh',
            'data_ultimo_comentario',
            'nome_ultimo_comentario',
            'id_laboratorio_psy',
            'id_laboratorio_pardini',
            'rede',
        ]);
    }

    public function getDadosBasicosPerformancePardini(array $idExecutivo)
    {
        return $this->performanceLaboratorioRepository->scopeQuery(function ($query) use ($idExecutivo) {
            return $query->whereIn('id_executivo_pardini', $idExecutivo);
        })
        ->all([
            'nome_laboratorio',
            'cidade',
            'estado',
            'ativo',
            'id_executivo_psy',
            'id_executivo_pardini',
            'nome_executivo_psy',
            'nome_executivo_pardini',
            'valor_exame_clt',
            'valor_exame_cnh',
            'data_ultimo_comentario',
            'nome_ultimo_comentario',
            'id_laboratorio_psy',
            'id_laboratorio_pardini',
            'rede',
        ]);
    }

    private function getPerformanceLaboratoriosPsy(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        return $this->vendaOrigemRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where("data_inclusao", ">=", $dataInicio->toDateTimeString())
            ->where("data_inclusao", "<=", $dataFim->toDateTimeString());
        })
        ->with(["laboratorio"])
        ->whereHas("laboratorio", function ($query) use ($idExecutivo) {
            $query->whereIn('id_executivo_psy', $idExecutivo);
        })
        ->groupBy("id_laboratorio")
        ->all(["id_laboratorio", DB::raw("SUM(quantidade) as qtd")]);
    }

    private function getPerformanceLaboratoriosPardini(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        return $this->vendaOrigemRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where("data_inclusao", ">=", $dataInicio->toDateTimeString())
            ->where("data_inclusao", "<=", $dataFim->toDateTimeString());
        })
        ->with(["laboratorio"])
        ->whereHas("laboratorio", function ($query) use ($idExecutivo) {
            $query->whereIn('id_laboratorio', $idExecutivo);
        })
        ->groupBy("id_laboratorio")
        ->all(["id_laboratorio", DB::raw("SUM(quantidade) as qtd")]);
    }

    private function pushValues(DatabaseCollection $dadosBasicos, DatabaseCollection $novosDadosB, DatabaseCollection $novosDadosA)
    {
        //dd($novosDadosB[0]);
        $novosDadosB->each(function ($item) use ($dadosBasicos, $novosDadosA) {
            dd($item, "xaninha");
        });
        dd("xana");
    }

    private function pushValuesWhenFound()
    {
        $this->push(collect([
            'nome_laboratorio',
            'cidade',
            'estado',
            'ativo',
            'id_executivo_psy',
            'id_executivo_pardini',
            'nome_executivo_psy',
            'nome_executivo_pardini',
            'valor_exame_clt',
            'valor_exame_cnh',
            'data_ultimo_comentario',
            'nome_ultimo_comentario',
            'id_laboratorio_psy',
            'id_laboratorio_pardini',
            'rede',
            'dataInicioPeriodoB',
            'dataFimPeriodoB',
            'dataInicioPeriodoA',
            'dataFimPeriodoA',
            'quantidadePeriodoB',
            'quantidadePeriodoA',
        ]));
    }

    private function pushValuesWhenNotFound()
    {

    }
}
