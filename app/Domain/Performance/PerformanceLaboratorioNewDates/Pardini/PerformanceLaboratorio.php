<?php

namespace Inside\Domain\Performance\PerformanceLaboratorioNewDates\Pardini;

use Carbon\Carbon;
use Inside\Repositories\Contracts\VendaOrigemRepository;
use \DB;

class PerformanceLaboratorio
{
    private $vendaOrigemRepository;

    public function __construct(VendaOrigemRepository $vendaOrigemRepository)
    {
        $this->vendaOrigemRepository = $vendaOrigemRepository;
    }

    public function get(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        $dataInicio = $dataInicio->toDateTimeString();
        $dataFim =  $dataFim->toDateTimeString();

        return $this->vendaOrigemRepository
        ->whereHas("laboratorio", function ($query) use ($idExecutivo) {
            $query->whereIn('id_laboratorio', $idExecutivo);
        })
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where("dw_vendas_origem.data_inclusao", ">=", $dataInicio)
            ->where("dw_vendas_origem.data_inclusao", "<=", $dataFim)
            ->where("dw_performance_laboratorio.rede", 1)
            ->where('dw_vendas_origem.teste', 'N')
            ->where('dw_vendas_origem.fluxo', '>=', 1)
            ->join('dw_performance_laboratorio', 'dw_performance_laboratorio.id_laboratorio_psy', '=', 'dw_vendas_origem.id_laboratorio')
            ->select([
                'dw_vendas_origem.id_laboratorio',
                'dw_performance_laboratorio.nome_laboratorio',
                'dw_performance_laboratorio.cidade',
                'dw_performance_laboratorio.estado',
                'dw_performance_laboratorio.ativo',
                'dw_performance_laboratorio.rede',
                'dw_performance_laboratorio.logistica_pardini',
                'dw_performance_laboratorio.id_executivo_psy',
                'dw_performance_laboratorio.id_executivo_pardini',
                'dw_performance_laboratorio.nome_executivo_psy',
                'dw_performance_laboratorio.nome_executivo_pardini',
                'dw_performance_laboratorio.valor_exame_clt',
                'dw_performance_laboratorio.valor_exame_cnh',
                'dw_performance_laboratorio.data_ultimo_comentario',
                'dw_performance_laboratorio.nome_ultimo_comentario',
                'dw_performance_laboratorio.id_laboratorio_psy',
                'dw_performance_laboratorio.id_laboratorio_pardini',
                DB::raw('SUM(dw_vendas_origem.quantidade) AS qtd')
            ])
            ->groupBy([
                'dw_vendas_origem.id_laboratorio',
                'dw_performance_laboratorio.nome_laboratorio',
                'dw_performance_laboratorio.cidade',
                'dw_performance_laboratorio.estado',
                'dw_performance_laboratorio.ativo',
                'dw_performance_laboratorio.rede',
                'dw_performance_laboratorio.logistica_pardini',
                'dw_performance_laboratorio.id_executivo_psy',
                'dw_performance_laboratorio.id_executivo_pardini',
                'dw_performance_laboratorio.nome_executivo_psy',
                'dw_performance_laboratorio.nome_executivo_pardini',
                'dw_performance_laboratorio.valor_exame_clt',
                'dw_performance_laboratorio.valor_exame_cnh',
                'dw_performance_laboratorio.data_ultimo_comentario',
                'dw_performance_laboratorio.nome_ultimo_comentario',
                'dw_performance_laboratorio.id_laboratorio_psy',
                'dw_performance_laboratorio.id_laboratorio_pardini',
            ]);
        })
        ->all();
    }
}
