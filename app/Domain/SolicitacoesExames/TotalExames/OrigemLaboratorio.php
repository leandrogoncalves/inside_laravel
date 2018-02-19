<?php

namespace Inside\Domain\SolicitacoesExames\TotalExames;

use Carbon\Carbon;
use Inside\Repositories\Contracts\FormularioRepository;
use \DB;

class OrigemLaboratorio implements OrigemInterface
{
    use HelpMethods;

    const FIELDS_SELECTED = [
        "LAB"
    ];

    private $formularioRepository;

    public function __construct(FormularioRepository $formularioRepository)
    {
        $this->formularioRepository = $formularioRepository;
    }

    public function getTotalExamesSolicitadosPardini(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        $dataInicio = $this->getDateFormatted($dataInicio);
        $dataFim = $this->getDateFormatted($dataFim);

        return $this->formularioRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where("OprFrmDtHrIncl", ">=", $dataInicio)
            ->where("OprFrmDtHrIncl", "<=", $dataFim)
            ->where("OprFrmStatus", "<>", "C") //PEGA TODOS OS EXAMES QUE NÃO ESTEJAM CANCELADOS
            ->where("OprFrmOrigem", '=', "LAB") //PEGA EXAMES CUJA A ORIGEM FOI SOLICITADO POR UM LABORATORIO
            ->where("OprFrmTipo", "<>", "C") //PEGA OS TIPOS DIFERENTES DE CNH
            ->where("OprFrmTipo", "<>", "T") //PEGA OS TIPOS DIFERENTES DE CLT
            ->where("OprFrmOrigem", "<>", "CAG");
        })
        ->with(["laboratorio"])
        ->whereHas("laboratorio", function ($query) use ($idExecutivo) {
            $query
            ->whereIn('id_laboratorio', $idExecutivo);
        })
        ->groupBy("OprFrmOrigem")
        ->orderBy("OprFrmOrigem")
        ->all(["OprFrmOrigem", DB::raw("count(1) as total")]);
    }

    public function getTotalExamesSolicitadosPsy(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        $dataInicio = $this->getDateFormatted($dataInicio);
        $dataFim = $this->getDateFormatted($dataFim);

        return $this->formularioRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where("OprFrmDtHrIncl", ">=", $dataInicio)
            ->where("OprFrmDtHrIncl", "<=", $dataFim)
            ->where("OprFrmStatus", "<>", "C") //PEGA TODOS OS EXAMES QUE NÃO ESTEJAM CANCELADOS
            ->where("OprFrmOrigem", '=', "LAB") //PEGA EXAMES CUJA A ORIGEM FOI SOLICITADO POR UM LABORATORIO
            ->where("OprFrmTipo", "<>", "C") //PEGA OS TIPOS DIFERENTES DE CNH
            ->where("OprFrmTipo", "<>", "T") //PEGA OS TIPOS DIFERENTES DE CLT
            ->where("OprFrmOrigem", "<>", "CAG");
        })
        ->with(["laboratorio"])
        ->whereHas("laboratorio", function ($query) use ($idExecutivo) {
            $query->whereIn('id_executivo_psy', $idExecutivo);
        })
        ->groupBy("OprFrmOrigem")
        ->orderBy("OprFrmOrigem")
        ->all(["OprFrmOrigem", DB::raw("count(1) as total")]);
    }
}
