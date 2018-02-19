<?php

namespace Inside\Domain\VendasUnidadesColetas\PerformanceLaboratorioNewDates;

use Inside\Repositories\Contracts\VendaOrigemRepository;
use Inside\Repositories\Contracts\PerformanceLaboratorioRepository;
use Carbon\Carbon;
use \DB;
use Illuminate\Database\Eloquent\Collection as DatabaseCollection;

class PerformanceLaboratorioNewDates
{

    private $vendaOrigemRepository;
    protected $performanceDataResults;

    public function __construct(VendaOrigemRepository $vendaOrigemRepository, PerformanceLaboratorioRepository $performanceLaboratorioRepository)
    {
        $this->vendaOrigemRepository = $vendaOrigemRepository;
        $this->performanceLaboratorioRepository = $performanceLaboratorioRepository;
        $this->performanceDataResults = collect([]);
    }

    public function getPsy(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        $newValuesPerformanceB = $this->getPerformanceLaboratoriosPsy($dataInicio, $dataFim, $idExecutivo);

        $differenceInDaysNegative = $dataFim->copy()->diffInDays($dataInicio);
        $differenceInDaysNegative = $differenceInDaysNegative * (-1);
        $dataInicioPeriodoA = $dataInicio->copy()->addDays(-1);
        $dataFimPeriodoA = $dataInicioPeriodoA->copy()->addDays($differenceInDaysNegative);

        $newValuesPerformanceA = $this->getPerformanceLaboratoriosPsy($dataInicioPeriodoA, $dataFimPeriodoA, $idExecutivo);
        $dadosBasicos = $this->getDadosBasicosPerformancePsy($idExecutivo);

        return $this->pushValuesPsy($dadosBasicos, $newValuesPerformanceB, $newValuesPerformanceA, $dataInicio, $dataFim, $dataInicioPeriodoA, $dataFimPeriodoA);
    }

    public function getPardini(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        $newValuesPerformanceB = $this->getPerformanceLaboratoriosPardini($dataInicio, $dataFim, $idExecutivo);

        $differenceInDaysNegative = $dataFim->copy()->diffInDays($dataInicio);
        $differenceInDaysNegative = $differenceInDaysNegative * (-1);
        $dataInicioPeriodoA = $dataInicio->copy()->addDays(-1);
        $dataFimPeriodoA = $dataInicioPeriodoA->copy()->addDays($differenceInDaysNegative);

        $newValuesPerformanceA = $this->getPerformanceLaboratoriosPardini($dataInicioPeriodoA, $dataFimPeriodoA, $idExecutivo);
        $dadosBasicos = $this->getDadosBasicosPerformancePardini($idExecutivo);

        $dataInicio = $dataInicio->toDateString();
        $dataFim = $dataFim->toDateString();
        $dataInicioPeriodoA = $dataInicioPeriodoA->toDateString();
        $dataFimPeriodoA = $dataFimPeriodoA->toDateString();

        return $this->pushValuesPardini($dadosBasicos, $newValuesPerformanceB, $newValuesPerformanceA, $dataInicio, $dataFim, $dataInicioPeriodoA, $dataFimPeriodoA);
    }

    public function getDadosBasicosPerformancePsy(array $idExecutivo)
    {
        return $this->performanceLaboratorioRepository->scopeQuery(function ($query) use ($idExecutivo) {
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
            'valor_exame_clt',
            'valor_exame_cnh',
            'data_ultimo_comentario',
            'nome_ultimo_comentario',
            'id_laboratorio_psy',
            'id_laboratorio_pardini',
            'rede',
        ]);
    }

    public function getDadosBasicosPerformancePardini(array $idExecutivo)
    {
        return $this->performanceLaboratorioRepository->scopeQuery(function ($query) use ($idExecutivo) {
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
            'valor_exame_clt',
            'valor_exame_cnh',
            'data_ultimo_comentario',
            'nome_ultimo_comentario',
            'id_laboratorio_psy',
            'id_laboratorio_pardini',
            'rede',
        ]);
    }

    private function getPerformanceLaboratoriosPsy(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        return $this->vendaOrigemRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where("data_inclusao", ">=", $dataInicio->toDateTimeString())
            ->where("data_inclusao", "<=", $dataFim->toDateTimeString());
        })
        ->with(["laboratorio"])
        ->whereHas("laboratorio", function ($query) use ($idExecutivo) {
            $query->whereIn('id_executivo_psy', $idExecutivo);
        })
        ->groupBy("id_laboratorio")
        ->all(["id_laboratorio", DB::raw("SUM(quantidade) as qtd")]);
    }

    private function getPerformanceLaboratoriosPardini(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        return $this->vendaOrigemRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where("data_inclusao", ">=", $dataInicio->toDateTimeString())
            ->where("data_inclusao", "<=", $dataFim->toDateTimeString());
        })
        ->with(["laboratorio"])
        ->whereHas("laboratorio", function ($query) use ($idExecutivo) {
            $query->whereIn('id_laboratorio', $idExecutivo);
        })
        ->groupBy("id_laboratorio")
        ->all(["id_laboratorio", DB::raw("SUM(quantidade) as qtd")]);
    }

    private function pushValuesPsy(DatabaseCollection $dadosBasicos, DatabaseCollection $novosDadosB, DatabaseCollection $novosDadosA, $dtInicioB, $dtFimB, $dtInicioA, $dtFimA)
    {
        $novosDadosB->each(function ($item) use ($dadosBasicos, $novosDadosA) {
            $dadosBasicos = $dadosBasicos->where('id_laboratorio_psy', $item->id_laboratorio);
            $dadosBasicos = $dadosBasicos->count() > 0? $dadosBasicos->first()->toArray() : $this->returnDadosBasicosWhenValuesNotFound($item->id_laboratorio);

            dd($dadosBasicos->where('id_laboratorio_psy', $item->id_laboratorio)->first());
            dd($item, "xaninha");
        });
        dd("xana");
    }

    private function pushValuesPardini(DatabaseCollection $dadosBasicos, DatabaseCollection $novosDadosB, DatabaseCollection $novosDadosA)
    {
        $novosDadosB->each(function ($item) use ($dadosBasicos, $novosDadosA) {
            dd($dadosBasicos[0]);
            dd($item, "xaninha");
        });
        dd("xana");
    }

    private function pushValues($dadosBasicos, $dtInicioB, $dtFimB, $dtInicioA, $dtFimA)
    {
        $this->performanceDataResults->push(collect([
            'nome_laboratorio' => $dadosBasicos['nome_laboratorio'],
            'cidade' => $dadosBasicos['cidade'],
            'estado' => $dadosBasicos['estado'],
            'ativo' => $dadosBasicos['ativo'],
            'id_executivo_psy' => $dadosBasicos['id_executivo_psy'],
            'id_executivo_pardini' => $dadosBasicos['id_executivo_pardini'],
            'nome_executivo_psy' => $dadosBasicos['nome_executivo_psy'],
            'nome_executivo_pardini' => $dadosBasicos['nome_executivo_pardini'],
            'valor_exame_clt' => $dadosBasicos['valor_exame_clt'],
            'valor_exame_cnh' => $dadosBasicos['valor_exame_cnh'],
            'data_ultimo_comentario' => $dadosBasicos['data_ultimo_comentario'],
            'nome_ultimo_comentario' => $dadosBasicos['nome_ultimo_comentario'],
            'id_laboratorio_psy' => $dadosBasicos['id_laboratorio_psy'],
            'id_laboratorio_pardini' => $dadosBasicos['id_laboratorio_pardini'],
            'rede' => $dadosBasicos['rede'],
            'dataInicioPeriodoB' => $dtInicioB,
            'dataFimPeriodoB' => '',
            'dataInicioPeriodoA' => '',
            'dataFimPeriodoA' => '',
            'quantidadePeriodoB' => '',
            'quantidadePeriodoA' => '',
            'variacao' => '',
            'variacaoPorcentual' => '',
        ]));
    }

    private function returnDadosBasicosWhenValuesNotFound($id)
    {
        return [
            'nome_laboratorio' => 'não encontrado na pesquisa - id laboratorio' . $id,
            'cidade' => 'não encontrado na pesquisa - id laboratorio' . $id,
            'estado' => 'não encontrado na pesquisa - id laboratorio' . $id,
            'ativo' => 'não encontrado na pesquisa - id laboratorio' . $id,
            'id_executivo_psy' => 'não encontrado na pesquisa - id laboratorio' . $id,
            'id_executivo_pardini' => 'não encontrado na pesquisa - id laboratorio' . $id,
            'nome_executivo_psy' => 'não encontrado na pesquisa - id laboratorio' . $id,
            'nome_executivo_pardini' => 'não encontrado na pesquisa - id laboratorio' . $id,
            'valor_exame_clt' => 'não encontrado na pesquisa - id laboratorio' . $id,
            'valor_exame_cnh' => 'não encontrado na pesquisa - id laboratorio' . $id,
            'data_ultimo_comentario' => 'não encontrado na pesquisa - id laboratorio' . $id,
            'nome_ultimo_comentario' => 'não encontrado na pesquisa - id laboratorio' . $id,
            'id_laboratorio_psy' => 'não encontrado na pesquisa - id laboratorio' . $id,
            'id_laboratorio_pardini' => 'não encontrado na pesquisa - id laboratorio' . $id,
            'rede' => 'não encontrado na pesquisa - id laboratorio' . $id,
        ];
    }
}
