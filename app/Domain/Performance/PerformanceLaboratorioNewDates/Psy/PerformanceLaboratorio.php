<?php

namespace Inside\Domain\Performance\PerformanceLaboratorioNewDates\Psy;

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

    public function get(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo, UsuarioLogado $user)
    {
        if ($user->isUserAdminPsy()) {
            return $this->queryAdmin($dataInicio, $dataFim, $idExecutivo);
        }

        if ($user->getIdGerente() === UsuarioLogado::ID_GERENTE_LABORATORIO || UsuarioLogado::ID_GERENTE_PONTO_PARCEIRO) {
            return $this->queryGerenteLaboratorio($dataInicio, $dataFim, $idExecutivo);
        }

        if ($user->getIdGerente() === UsuarioLogado::ID_GERENTE_CORPORATIVO) {
            return $this->queryGerenteCorporativo($dataInicio, $dataFim, $idExecutivo);
        }

        throw new \Exception("Perfil de acesso inválido", 400);
    }

    private function queryGerenteLaboratorio(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        $dataInicio = $dataInicio->toDateTimeString();
        $dataFim =  $dataFim->toDateTimeString();

        return $this->vendaOrigemRepository
        ->scopeQuery(function ($query) use ($idExecutivo, $dataInicio, $dataFim) {
            return $query
            ->where("dw_vendas_origem.data_inclusao", ">=", $dataInicio)
            ->where("dw_vendas_origem.data_inclusao", "<=", $dataFim)

            ->where(function ($queryWhere) {
                $queryWhere->where('dw_vendas_origem.origem', '<>', 'CLI')
                ->orWhere(function ($queryOr) {
                    $queryOr->where('dw_vendas_origem.origem', 'SIS')
                    ->where('dw_vendas_origem.tipo', '<>', 'R');
                });
            })

            ->where('dw_vendas_origem.teste', 'N')
            ->where('dw_vendas_origem.fluxo', '>=', 1)
            ->whereIn('dw_vendas_origem.id_executivo_psy', $idExecutivo)

            ->join('dw_performance_laboratorio', 'dw_performance_laboratorio.id_laboratorio_psy', '=', 'dw_vendas_origem.id_laboratorio')
            ->select([
                'dw_vendas_origem.id_laboratorio',
                'dw_performance_laboratorio.nome_laboratorio',
                'dw_performance_laboratorio.cidade',
                'dw_performance_laboratorio.estado',
                'dw_performance_laboratorio.status',
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
                DB::raw("(sum(dw_vendas_origem.total_venda) / sum(dw_vendas_origem.quantidade)) as preco_medio"),
                DB::raw('SUM(dw_vendas_origem.quantidade) AS qtd')
            ])
            ->groupBy([
                'dw_vendas_origem.id_laboratorio',
                'dw_performance_laboratorio.nome_laboratorio',
                'dw_performance_laboratorio.cidade',
                'dw_performance_laboratorio.estado',
                'dw_performance_laboratorio.status',
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

    private function queryGerenteCorporativo(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        $dataInicio = $dataInicio->toDateTimeString();
        $dataFim =  $dataFim->toDateTimeString();

        return $this->vendaOrigemRepository
        ->scopeQuery(function ($query) use ($idExecutivo, $dataInicio, $dataFim) {
            return $query
            ->where("dw_vendas_origem.data_inclusao", ">=", $dataInicio)
            ->where("dw_vendas_origem.data_inclusao", "<=", $dataFim)

            ->where(function ($queryWhere) {
                $queryWhere->where('dw_vendas_origem.origem', '=', 'CLI')
                ->orWhere(function ($queryOr) {
                    $queryOr->where('dw_vendas_origem.origem', 'SIS')
                    ->where('dw_vendas_origem.tipo', '=', 'R');
                });
            })
            ->where('dw_vendas_origem.teste', 'N')
            ->where('dw_vendas_origem.fluxo', '>=', 1)

            ->join('dw_performance_laboratorio', 'dw_performance_laboratorio.id_laboratorio_psy', '=', 'dw_vendas_origem.id_laboratorio')
            ->select([
                'dw_vendas_origem.id_laboratorio',
                'dw_performance_laboratorio.nome_laboratorio',
                'dw_performance_laboratorio.cidade',
                'dw_performance_laboratorio.estado',
                'dw_performance_laboratorio.status',
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
                DB::raw("(sum(dw_vendas_origem.total_venda) / sum(dw_vendas_origem.quantidade)) as preco_medio"),
                DB::raw('SUM(dw_vendas_origem.quantidade) AS qtd')
            ])
            ->groupBy([
                'dw_vendas_origem.id_laboratorio',
                'dw_performance_laboratorio.nome_laboratorio',
                'dw_performance_laboratorio.cidade',
                'dw_performance_laboratorio.estado',
                'dw_performance_laboratorio.status',
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

    private function queryAdmin(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        $dataInicio = $dataInicio->toDateTimeString();
        $dataFim =  $dataFim->toDateTimeString();

        return $this->vendaOrigemRepository
        ->scopeQuery(function ($query) use ($idExecutivo, $dataInicio, $dataFim) {
            return $query
            ->where("dw_vendas_origem.data_inclusao", ">=", $dataInicio)
            ->where("dw_vendas_origem.data_inclusao", "<=", $dataFim)

            ->where('dw_vendas_origem.teste', 'N')
            ->where('dw_vendas_origem.fluxo', '>=', 1)
            ->whereIn('dw_vendas_origem.id_executivo_psy', $idExecutivo)

            ->join('dw_performance_laboratorio', 'dw_performance_laboratorio.id_laboratorio_psy', '=', 'dw_vendas_origem.id_laboratorio')
            ->select([
                'dw_vendas_origem.id_laboratorio',
                'dw_performance_laboratorio.nome_laboratorio',
                'dw_performance_laboratorio.cidade',
                'dw_performance_laboratorio.estado',
                'dw_performance_laboratorio.status',
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
                DB::raw("(sum(dw_vendas_origem.total_venda) / sum(dw_vendas_origem.quantidade)) as preco_medio"),
                DB::raw('SUM(dw_vendas_origem.quantidade) AS qtd')
            ])
            ->groupBy([
                'dw_vendas_origem.id_laboratorio',
                'dw_performance_laboratorio.nome_laboratorio',
                'dw_performance_laboratorio.cidade',
                'dw_performance_laboratorio.estado',
                'dw_performance_laboratorio.status',
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
