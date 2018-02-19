<?php

namespace Inside\Domain\SolicitacoesExames\TotalExames;

use Carbon\Carbon;
use Inside\Repositories\Contracts\FormularioRepository;
use Inside\Repositories\Contracts\VendaLoteRepository;
use Inside\Domain\UsuarioLogado;
use \DB;

class OrigemCaged implements OrigemInterface
{
    use HelpMethods;
    const FIELDS_SELECTED = [
        "CAG",
    ];

    private $formularioRepository;
    private $vendaLoteRepository;
    private $user;

    public function __construct(FormularioRepository $formularioRepository, VendaLoteRepository $vendaLoteRepository)
    {
        $this->formularioRepository = $formularioRepository;
        $this->vendaLoteRepository = $vendaLoteRepository;
        $this->user = null;
    }

    public function setUsuario(UsuarioLogado $user)
    {
        $this->user = $user;
    }

    public function getTotalExamesSolicitadosPardini(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        return $this->returnTotalExamesByUser($dataInicio, $dataFim, $idExecutivo);
    }

    public function getTotalExamesSolicitadosPsy(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        return $this->returnTotalExamesByUser($dataInicio, $dataFim, $idExecutivo);
    }

    private function returnTotalExamesByUser(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        if (isset($this->user)) {
            switch ($this->user->getPerfilAcessoPorExtenso()) {
                case UsuarioLogado::ADMIN_PSY:
                    return $this->getTotalExamesSolicitadosPsyAdmin($dataInicio);
                break;

                case UsuarioLogado::EXECUTIVO_PSY:
                    return $this->getTotalExamesSolicitadosPsyNotAdmin($dataInicio, $dataFim, $idExecutivo);
                break;

                case UsuarioLogado::SUPERVISOR_PSY:
                    return $this->getTotalExamesSolicitadosPsyNotAdmin($dataInicio, $dataFim, $idExecutivo);
                break;
                case UsuarioLogado::GERENTE_PSY:
                    return $this->getTotalExamesSolicitadosPsyNotAdmin($dataInicio, $dataFim, $idExecutivo);
                break;

                case UsuarioLogado::ADMIN_PARDINI:
                    return $this->getTotalExamesSolicitadosPardiniAdmin($dataInicio);
                break;

                case UsuarioLogado::EXECUTIVO_PARDINI:
                    return $this->getTotalExamesSolicitadosPardiniNotAdmin($dataInicio, $dataFim, $idExecutivo);
                break;

                case UsuarioLogado::SUPERVISOR_PARDINI:
                    return $this->getTotalExamesSolicitadosPardiniNotAdmin($dataInicio, $dataFim, $idExecutivo);
                break;
                case UsuarioLogado::GERENTE_PARDINI:
                    return $this->getTotalExamesSolicitadosPardiniNotAdmin($dataInicio, $dataFim, $idExecutivo);
                break;

                default:
                    throw new \Exception("Erro, perfil de acesso desconhecido", 400);
                break;
            }
        }
        throw new \Exception("Favor setar um usuário antes de buscar a origem caged.", 400);
    }

    private function getTotalExamesSolicitadosPardiniAdmin(Carbon $dataInicio)
    {
        $dataInicio = $dataInicio->format("Y-m-d");

        return $this->vendaLoteRepository
        ->scopeQuery(function ($query) use ($dataInicio) {
            return $query
            ->where("created_at", "LIKE", "{$dataInicio}%");
        })
        ->all([DB::raw("'CAG' as OprFrmOrigem"), DB::raw("COALESCE(SUM(VdaLoteExameQuantidade),0) as total")]);
    }

    private function getTotalExamesSolicitadosPsyAdmin(Carbon $dataInicio)
    {
        $dataInicio = $dataInicio->format("Y-m-d");

        return $this->vendaLoteRepository
        ->scopeQuery(function ($query) use ($dataInicio) {
            return $query
            ->where("created_at", "LIKE", "{$dataInicio}%");
        })
        ->all([DB::raw("'CAG' as OprFrmOrigem"), DB::raw("COALESCE(SUM(VdaLoteExameQuantidade),0) as total")]);
    }

    private function getTotalExamesSolicitadosPardiniNotAdmin(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        $dataInicio = $this->getDateFormatted($dataInicio);
        $dataFim = $this->getDateFormatted($dataFim);

        return $this->formularioRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where("OprFrmDtHrIncl", ">=", $dataInicio)
            ->where("OprFrmDtHrIncl", "<=", $dataFim)
            ->where("OprFrmStatus", "<>", "C")
            ->where("OprFrmOrigem", "=", "CAG");
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

    private function getTotalExamesSolicitadosPsyNotAdmin(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        $dataInicio = $this->getDateFormatted($dataInicio);
        $dataFim = $this->getDateFormatted($dataFim);

        return $this->formularioRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where("OprFrmDtHrIncl", ">=", $dataInicio)
            ->where("OprFrmDtHrIncl", "<=", $dataFim)
            ->where("OprFrmStatus", "<>", "C")
            ->where("OprFrmOrigem", "=", "CAG");
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
