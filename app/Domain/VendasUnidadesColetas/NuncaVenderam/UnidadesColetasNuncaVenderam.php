<?php

namespace Inside\Domain\VendasUnidadesColetas\NuncaVenderam;

use Inside\Repositories\Contracts\VendaLaboratorioRepository;
use Inside\Repositories\Contracts\LaboratorioRepository;
use Carbon\Carbon;
use \DB;

class UnidadesColetasNuncaVenderam
{
    private $vendaLaboratorioRepository;
    private $laboratorioRepository;

    const NUNCA_VENDEU = 1;
    const MOVIDO_EXCLUSAO = 1;

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
            ->whereIn('id_laboratorio', $laboratorios->toArray());
        })
        ->groupBy("id_laboratorio")
        ->all(["id_laboratorio"]);

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
            ->whereIn('id_laboratorio', $laboratorios->toArray());
        })
        ->groupBy("id_laboratorio")
        ->all(["id_laboratorio"]);

        return $laboratorios->whereNotIn('pespeslabauto', $laboratoriosComVenda->pluck('id_laboratorio'))->count();
    }
}
