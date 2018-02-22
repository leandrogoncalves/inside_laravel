<?php

namespace Inside\Domain\VendasUnidadesColetas\MovidosExclusao;


use Inside\Repositories\Contracts\PerformanceLaboratorioRepository;
use Inside\Domain\VendasUnidadesColetas\VendasUnidadesColetas;
use Inside\Domain\VendasUnidadesColetas\MovidosExclusao\Transformers\MovidosExclusaoTransformer;


class MovidosExclusao
{
    private $performanceLaboratorioRepository;
    private $transformer;

    public function __construct(PerformanceLaboratorioRepository $performanceLaboratorioRepository, MovidosExclusaoTransformer $transformer)
    {
        $this->performanceLaboratorioRepository = $performanceLaboratorioRepository;
        $this->transformer = $transformer;
    }

    public function getDetailPsy(array $idExecutivo)
    {
        $laboratoriosComVendaDetail = $this->performanceLaboratorioRepository
            ->scopeQuery(function ($query) use ($idExecutivo) {
                return $query
                    ->whereIn('id_executivo_psy', $idExecutivo)
                    ->where('movido_exclusao',VendasUnidadesColetas::MOVIDO_EXCLUSAO)
                    ->orderBy('id_laboratorio_psy', 'asc');
            })
            ->all([
                'nome_laboratorio',
                'cidade',
                'rede',
                'logistica_pardini',
                'id_laboratorio_psy',
            ]);

        return $this->transformer->transform($laboratoriosComVendaDetail);
    }

    public function getDetailPardini(array $idExecutivo)
    {
        $laboratoriosComVendaDetail = $this->performanceLaboratorioRepository
            ->scopeQuery(function ($query) use ($idExecutivo) {
                return $query
                    ->whereIn('id_executivo_pardini', $idExecutivo)
                    ->where('movido_exclusao',VendasUnidadesColetas::MOVIDO_EXCLUSAO)
                    ->orderBy('id_laboratorio_pardini', 'asc');
            })
            ->all([
                'nome_laboratorio',
                'cidade',
                'rede',
                'logistica_pardini',
                'id_laboratorio_psy',
            ]);

        return $this->transformer->transform($laboratoriosComVendaDetail);
    }
}