<?php

namespace Inside\Domain\VendasUnidadesColetas\ComVenda;

use Inside\Repositories\Contracts\PerformanceLaboratorioRepository;
use Inside\Repositories\Contracts\VendaLaboratorioRepository;
use Inside\Repositories\Contracts\LaboratorioRepository;
use Inside\Domain\VendasUnidadesColetas\ComVenda\Transformers\UnidadeColetaComVendaDetailTransformer;
use Carbon\Carbon;
use \DB;

class UnidadesColetaComVendaDetail
{
    private $vendaLaboratorioRepository;
    private $laboratorioRepository;
    private $performanceLaboratorioRepository;
    private $transformer;

    public function __construct(VendaLaboratorioRepository $vendaLaboratorioRepository,
                                PerformanceLaboratorioRepository $performanceLaboratorioRepository,
                                LaboratorioRepository $laboratorioRepository,
                                UnidadeColetaComVendaDetailTransformer $transformer)
    {
        $this->vendaLaboratorioRepository = $vendaLaboratorioRepository;
        $this->laboratorioRepository = $laboratorioRepository;
        $this->performanceLaboratorioRepository = $performanceLaboratorioRepository;
        $this->transformer = $transformer;
    }

    public function getUnidadesColetaPsyDetail(array $idExecutivo)
    {
        $laboratoriosComVendaDetail = $this->performanceLaboratorioRepository
            ->scopeQuery(function ($query) use ($idExecutivo) {
                return $query
                        ->whereIn('id_executivo_psy', $idExecutivo)
                        ->orderBy('id_laboratorio_psy','asc');
            })
            ->all([
                'nome_laboratorio',
                'cidade',
                'estado',
                'status',
                'rede',
                'logistica_pardini',
                'id_executivo_psy',
                'id_executivo_pardini',
                'id_laboratorio_psy',
                'id_laboratorio_pardini',
                'nome_executivo_psy',
                'nome_executivo_pardini',
                'data_base',
                'periodo_a_glaudyson',
                'periodo_b_glaudyson',
                'variacao_glaudyson',
                'variacao_porcentual_glaudyson',
                'periodo_a_teza',
                'periodo_b_teza',
                'variacao_teza',
                'variacao_porcentual_teza',
                'valor_exame_clt',
                'valor_exame_cnh',
                'data_ultimo_comentario',
                'nome_ultimo_comentario',
                'preco_medio',
            ]);

        return $this->transformer->transform($laboratoriosComVendaDetail);
    }

    public function getUnidadesColetaPardiniDetail(array $idExecutivo)
    {
        $laboratoriosComVendaDetail = $this->performanceLaboratorioRepository
            ->scopeQuery(function ($query) use ($idExecutivo) {
                return $query
                        ->whereIn('id_laboratorio_pardini', $idExecutivo)
                        ->orderBy('id_executivo_pardini', 'asc');
            })
            ->all([
                'nome_laboratorio',
                'cidade',
                'estado',
                'status',
                'rede',
                'logistica_pardini',
                'id_executivo_psy',
                'id_executivo_pardini',
                'id_laboratorio_psy',
                'id_laboratorio_pardini',
                'nome_executivo_psy',
                'nome_executivo_pardini',
                'data_base',
                'periodo_a_glaudyson',
                'periodo_b_glaudyson',
                'variacao_glaudyson',
                'variacao_porcentual_glaudyson',
                'periodo_a_teza',
                'periodo_b_teza',
                'variacao_teza',
                'variacao_porcentual_teza',
                'valor_exame_clt',
                'valor_exame_cnh',
                'data_ultimo_comentario',
                'nome_ultimo_comentario',
                'preco_medio',
            ]);

        return $this->transformer->transform($laboratoriosComVendaDetail);
    }
}
