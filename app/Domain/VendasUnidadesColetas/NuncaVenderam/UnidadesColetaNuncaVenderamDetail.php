<?php

namespace Inside\Domain\VendasUnidadesColetas\NuncaVenderam;

use Inside\Domain\VendasUnidadesColetas\NuncaVenderam\Transformers\UnidadeColetaSemVendaDetailsTransformer;
use Inside\Repositories\Contracts\PerformanceLaboratorioRepository;
use Carbon\Carbon;
use \DB;


class UnidadesColetaNuncaVenderamDetail
{
    private $performanceLaboratorioRepository;
    private $transformer;

    public function __construct(PerformanceLaboratorioRepository $performanceLaboratorioRepository,UnidadeColetaSemVendaDetailsTransformer $transformer)
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
                    ->where('nunca_vendeu',UnidadesColetasNuncaVenderam::MOVIDO_EXCLUSAO)
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

    public function getDetailPardini(array $id_executivo)
    {
        return '';
    }
}