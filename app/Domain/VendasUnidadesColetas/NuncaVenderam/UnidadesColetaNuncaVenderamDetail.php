<?php

namespace Inside\Domain\VendasUnidadesColetas\NuncaVenderam;

use Inside\Domain\VendasUnidadesColetas\NuncaVenderam\Transformers\UnidadeColetaNuncaVendeuDetailsTransformer;
use Inside\Domain\VendasUnidadesColetas\VendasUnidadesColetas;
use Inside\Repositories\Contracts\PerformanceLaboratorioRepository;


class UnidadesColetaNuncaVenderamDetail
{
    private $performanceLaboratorioRepository;
    private $transformer;

    public function __construct(PerformanceLaboratorioRepository $performanceLaboratorioRepository, UnidadeColetaNuncaVendeuDetailsTransformer $transformer)
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
                    ->where('nunca_vendeu',VendasUnidadesColetas::NUNCA_VENDEU)
                    ->orderBy('id_laboratorio_psy', 'asc');
            })
            ->all([
                'nome_laboratorio',
                'cidade',
                'rede',
                'logistica_pardini',
                'id_laboratorio_psy',
                'data_ultimo_comentario',
                'nome_ultimo_comentario'
            ]);

        return $this->transformer->transform($laboratoriosComVendaDetail);
    }

    public function getDetailPardini(array $idExecutivo)
    {
        $laboratoriosComVendaDetail = $this->performanceLaboratorioRepository
            ->scopeQuery(function ($query) use ($idExecutivo) {
                return $query
                    ->whereIn('id_executivo_pardini', $idExecutivo)
                    ->where('nunca_vendeu',VendasUnidadesColetas::NUNCA_VENDEU)
                    ->orderBy('id_laboratorio_pardini', 'asc');
            })
            ->all([
                'nome_laboratorio',
                'cidade',
                'rede',
                'logistica_pardini',
                'id_laboratorio_psy',
                'data_ultimo_comentario',
                'nome_ultimo_comentario'
            ]);

        return $this->transformer->transform($laboratoriosComVendaDetail);
    }
}