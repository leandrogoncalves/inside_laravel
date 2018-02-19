<?php

namespace Inside\Domain\VendasUnidadesColetas\SemVenda;

use Inside\Repositories\Contracts\PerformanceLaboratorioRepository;
use Inside\Repositories\Contracts\VendaLaboratorioRepository;
use Inside\Repositories\Contracts\LaboratorioRepository;
use Carbon\Carbon;
use \DB;


class UnidadesColetaSemVendaDetail
{
    private $vendaLaboratorioRepository;
    private $laboratorioRepository;

    public function __construct( PerformanceLaboratorioRepository $performanceLaboratorioRepository,
                                LaboratorioRepository $laboratorioRepository)
    {
        $this->performanceLaboratorioRepository = $performanceLaboratorioRepository;
        $this->laboratorioRepository = $laboratorioRepository;
    }

    public function getDetailPsy(array $idExecutivo)
    {
        $laboratorios = $this->laboratorioRepository
            ->scopeQuery(function ($query) use ($idExecutivo) {
                return $query->whereIn('id_executivo_psy', $idExecutivo);
            })->all(['pespeslabauto']);

        $laboratoriosComVenda = $this->vendaLaboratorioRepository
            ->scopeQuery(function ($query) use ($laboratorios) {
                return $query->whereIn('id_laboratorio', $laboratorios->toArray());
            })
            ->groupBy("id_laboratorio")
            ->all([
                "id_laboratorio",
                'nome_laboratorio',
                'cidade'
            ]);

        return $laboratorios->whereNotIn('pespeslabauto', $laboratoriosComVenda->pluck('id_laboratorio'))->count();
    }
}