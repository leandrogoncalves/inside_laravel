<?php

namespace Inside\Services\SolicitacoesExames;

use Inside\Repositories\Contracts\LaboratorioRepository;
use Inside\Repositories\Contracts\FormularioRepository;

use Carbon\Carbon;
use \DB;

class TotalExames
{
    private $formularioRepository;
    private $executivos;

    public function __construct(Executivos $executivos, FormularioRepository $formularioRepository)
    {
        $this->formularioRepository = $formularioRepository;
        $this->executivos = $executivos;
    }

    public function getTotalExamesSolicitados(Carbon $dataInicio, Carbon $dataFim, UsuarioLogado $user)
    {
        $idExecutivoPsy = $this->executivos->getIdExecutivo($user);
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
        ->whereHas("laboratorio", function ($query) use ($idExecutivoPsy) {
            $query->whereIn('id_executivo_psy', $idExecutivoPsy);
        })
        ->groupBy("OprFrmOrigem")
        ->orderBy("OprFrmOrigem")
        ->all(["OprFrmOrigem", DB::raw("count(1) as total")]);
    }

    private function getDateFormatted(Carbon $date)
    {
        return $date->toDateTimeString();
    }
}
