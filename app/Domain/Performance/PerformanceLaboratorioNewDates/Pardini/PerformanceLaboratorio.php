<?php

namespace Inside\Domain\Performance\PerformanceLaboratorioNewDates\Pardini;

use Carbon\Carbon;
use Inside\Repositories\Contracts\VendaOrigemRepository;
use Inside\Domain\UsuarioLogado;
use \DB;

class PerformanceLaboratorio
{
    private $vendaOrigemRepository;

    public function __construct(VendaOrigemRepository $vendaOrigemRepository)
    {
        $this->vendaOrigemRepository = $vendaOrigemRepository;
    }

    public function get(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo, bool $isUserAdmin)
    {
        if ($isUserAdmin) {
            return $this->queryAdmin($dataInicio, $dataFim, $idExecutivo);
        }

        return $this->queryBasic($dataInicio, $dataFim, $idExecutivo);
    }

    private function queryBasic(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        dd($idExecutivo);
        $dataInicio = $dataInicio->toDateTimeString();
        $dataFim =  $dataFim->toDateTimeString();

        $this->vendaOrigemRepository
        /* PRIMEIRA LEVA DE WHERES - FILTRA DATAS, EXECUTIVOS E FILTROS COMERCIAIS DA TABELA dw_vendas_origem */
        ->scopeQuery(function ($query) use ($idExecutivo, $dataInicio, $dataFim) {
            return $query
            ->where("data_inclusao", ">=", $dataInicio)
            ->where("data_inclusao", "<=", $dataFim)

            ->where('teste', 'N')
            ->where('fluxo', '>=', 1)
            ->whereIn('id_executivo_pardini', $idExecutivo);
        })
        /* SEGUNDA LEVA DE WHERES - AGORA PARA JUNTAR COM A TABELA dw_performance_laboratorio E GANHAR CAMPOS DELA. */
        ->scopeQuery(function ($query) {
            return $query
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
        })->all();
    }

    private function queryAdmin()
    {

    }
}
