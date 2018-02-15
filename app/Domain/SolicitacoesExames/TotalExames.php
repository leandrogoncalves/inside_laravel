<?php

namespace Inside\Domain\SolicitacoesExames;

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
        if ($user->isUserPsy()) {
            return $this->getTotalExamesSolicitadosPsy($dataInicio, $dataFim, $user);
        }

        if ($user->isUserPardini()) {
            return $this->getTotalExamesSolicitadosPardini($dataInicio, $dataFim, $user);
        }

        throw new Exception("Usuário de perfil inválido, não é nem Pardini e nem Psy.", 400);
    }

    private function getTotalExamesSolicitadosPsy(Carbon $dataInicio, Carbon $dataFim, UsuarioLogado $user)
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

    private function getTotalExamesSolicitadosPardini(Carbon $dataInicio, Carbon $dataFim, UsuarioLogado $user)
    {
        $idExecutivo = $this->executivos->getIdExecutivo($user);
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


    private function getDateFormatted(Carbon $date)
    {
        return $date->toDateTimeString();
    }
}
