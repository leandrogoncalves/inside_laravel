<?php

namespace Inside\Domain\VendasUnidadesColetas\MovidosExclusao;


use Inside\Repositories\Contracts\PerformanceLaboratorioRepository;

class MovidosExclusao
{
    private $performanceLaboratorioRepository;

    public function __construct(PerformanceLaboratorioRepository $performanceLaboratorioRepository)
    {
        $this->performanceLaboratorioRepository = $performanceLaboratorioRepository;
    }

    public function getLaboratoriosMovidosExclusaoPsy(int $idExecutivo)
    {
        return $this->performanceLaboratorioRepository->scopeQuery(function ($query) use ($idExecutivo) {
                return $query->whereIn('id_executivo_psy', $idExecutivo);
            })
            ->groupBy("id_laboratorio")
            ->all([
                "id_laboratorio",
                'nome_laboratorio',
                'cidade'
            ]);
    }
}