<?php

namespace Inside\Domain\SolicitacoesExames\TotalExames;

use Carbon\Carbon;
use Inside\Repositories\Contracts\FormularioRepository;
use \DB;

class OrigemBasica implements OrigemInterface
{
    use HelpMethods;

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
            ->where("OprFrmStatus", "<>", "C")
            ->where("OprFrmOrigem", "<>", "CAG")
            ->where("OprFrmOrigem", "<>", "LAB");
        })
        ->with(["laboratorio"])
        ->whereHas("laboratorio", function ($query) use ($idExecutivo) {
            $query
            ->where("PesPesRedeAuto", "=", "1")
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
            ->where("OprFrmStatus", "<>", "C")
            ->where("OprFrmOrigem", "<>", "CAG")
            ->where("OprFrmOrigem", "<>", "LAB");
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
