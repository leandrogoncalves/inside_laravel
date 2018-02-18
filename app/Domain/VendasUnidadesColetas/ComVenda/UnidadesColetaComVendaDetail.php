<?php

namespace Inside\Domain\VendasUnidadesColetas\ComVenda;

use Inside\Repositories\Contracts\PerformanceLaboratorioRepository;
use Inside\Repositories\Contracts\VendaLaboratorioRepository;
use Inside\Repositories\Contracts\LaboratorioRepository;
use Carbon\Carbon;
use \DB;


class UnidadesColetaComVendaDetail
{
    private $vendaLaboratorioRepository;
    private $laboratorioRepository;
    private $performanceLaboratorioRepository;

    public function __construct(VendaLaboratorioRepository $vendaLaboratorioRepository,
                                PerformanceLaboratorioRepository $performanceLaboratorioRepository,
                                LaboratorioRepository $laboratorioRepository)
    {
        $this->vendaLaboratorioRepository = $vendaLaboratorioRepository;
        $this->laboratorioRepository = $laboratorioRepository;
        $this->performanceLaboratorioRepository = $performanceLaboratorioRepository;
    }

    public function getUnidadesColetaPsyDetail(array $idExecutivos)
    {
        $idExecutivo = [];
        foreach ($idExecutivos as $id){
            $idExecutivo[] = $id['id_executivo'];
        }

        $laboratoriosComVendaDetail = $this->performanceLaboratorioRepository
            ->scopeQuery(function ($query) use ($idExecutivo) {
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
                'nome_ultimo_comentario'

            ]);

        return $laboratoriosComVendaDetail;

    }

    public function getUnidadesColetaPardiniDetail(array $idExecutivos)
    {
        $idExecutivo = [];
        foreach ($idExecutivos as $id){
            $idExecutivo[] = $id['id_executivo'];
        }

        $laboratoriosComVendaDetail = $this->performanceLaboratorioRepository
            ->scopeQuery(function ($query) use ($idExecutivo) {
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
                'nome_ultimo_comentario'

            ]);

        return $laboratoriosComVendaDetail;
    }


}