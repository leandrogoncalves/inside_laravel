<?php

namespace Inside\Domain\VendasUnidadesColetas\SemVenda;

use Inside\Repositories\Contracts\PerformanceLaboratorioRepository;
use Inside\Domain\VendasUnidadesColetas\SemVenda\Transformers\UnidadeColetaSemVendaDetailTransformer;


class UnidadesColetaSemVendaDetail
{
    private $vendaLaboratorioRepository;
    private $transformer;

    public function __construct( PerformanceLaboratorioRepository $performanceLaboratorioRepository,
                                 UnidadeColetaSemVendaDetailTransformer $transformer)
    {
        $this->vendaLaboratorioRepository = $performanceLaboratorioRepository;
        $this->transformer = $transformer;
    }

    public function getDetailPsy(array $idExecutivo)
    {

        $labsSemVendaDetail =   $this->vendaLaboratorioRepository
            ->scopeQuery(function ($query) use ($idExecutivo) {
                return $query
                    ->whereIn('id_executivo_psy', $idExecutivo)
                    ->where('dias_sem_vender','>=','10')
                    ->orderBy('id_laboratorio_psy', 'asc');
            })
            ->all([
                'nome_laboratorio',
                'cidade',
                'estado',
                'rede',
                'logistica_pardini',
                'id_executivo_psy',
                'id_executivo_pardini',
                'id_laboratorio_psy',
                'id_laboratorio_pardini',
                'nome_executivo_psy',
                'nome_executivo_pardini',
                'data_ultima_venda',
                'dias_sem_vender',
                'qtd_vendas_trinta_dias',
                'data_ultimo_comentario',
                'nome_ultimo_comentario'
            ]);

        return $this->transformer->transform($labsSemVendaDetail);
    }

    public function getDetailPardini(array $idExecutivo)
    {
        $labsSemVendaDetail = $this->vendaLaboratorioRepository
            ->scopeQuery(function ($query) use ($idExecutivo) {
                return $query
                    ->whereIn('id_executivo_pardini', $idExecutivo)
                    ->where('dias_sem_vender','>=','10')
                    ->orderBy('id_laboratorio_psy', 'asc');
            })
            ->all([
                'nome_laboratorio',
                'cidade',
                'estado',
                'ativo',
                'rede',
                'logistica_pardini',
                'id_executivo_psy',
                'id_executivo_pardini',
                'id_laboratorio_psy',
                'id_laboratorio_pardini',
                'nome_executivo_psy',
                'nome_executivo_pardini',
                'data_ultima_venda',
                'dias_sem_vender',
                'qtd_vendas_trinta_dias',
                'data_ultimo_comentario',
                'nome_ultimo_comentario'
            ]);

        return $this->transformer->transform($labsSemVendaDetail);
    }
}