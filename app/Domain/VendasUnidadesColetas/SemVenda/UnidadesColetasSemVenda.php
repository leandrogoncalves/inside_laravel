<?php

namespace Inside\Domain\VendasUnidadesColetas\SemVenda;

use Inside\Repositories\Contracts\VendaLaboratorioRepository;
use Inside\Repositories\Contracts\LaboratorioRepository;
use Carbon\Carbon;
use \DB;

class UnidadesColetasSemVenda
{
    private $repository;

    public function __construct(VendaLaboratorioRepository $vendaLaboratorioRepository, LaboratorioRepository $laboratorioRepository)
    {
        $this->vendaLaboratorioRepository = $vendaLaboratorioRepository;
        $this->laboratorioRepository = $laboratorioRepository;
    }

    public function getUnidadesColetasPsy(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        $laboratorios = $this->laboratorioRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim, $idExecutivo) {
            return $query->whereIn('id_executivo_psy', $idExecutivo);
        })->all(['pespeslabauto']);

        $laboratoriosComVenda = $this->vendaLaboratorioRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim, $laboratorios) {
            return $query
            ->where("data_inclusao", ">=", $dataInicio->toDateTimeString())
            ->where("data_inclusao", "<=", $dataFim->toDateTimeString())
            ->whereIn('id_laboratorio', $laboratorios->toArray());
        })
        ->groupBy("id_laboratorio")
        ->all(["id_laboratorio", DB::raw("SUM(quantidade) as qtd")]);

        return $laboratorios->whereNotIn('pespeslabauto', $laboratoriosComVenda->pluck('id_laboratorio'))->count();
    }

    public function getUnidadesColetasPardini(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        $laboratorios = $this->laboratorioRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim, $idExecutivo) {
            return $query->whereIn('id_laboratorio', $idExecutivo);
        })->all(['pespeslabauto']);

        $laboratoriosComVenda = $this->vendaLaboratorioRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim, $laboratorios) {
            return $query
            ->where("data_inclusao", ">=", $dataInicio->toDateTimeString())
            ->where("data_inclusao", "<=", $dataFim->toDateTimeString())
            ->whereIn('id_laboratorio', $laboratorios->toArray());
        })
        ->groupBy("id_laboratorio")
        ->all(["id_laboratorio", DB::raw("SUM(quantidade) as qtd")]);

        return $laboratorios->whereNotIn('pespeslabauto', $laboratoriosComVenda->pluck('id_laboratorio'))->count();
    }
}
