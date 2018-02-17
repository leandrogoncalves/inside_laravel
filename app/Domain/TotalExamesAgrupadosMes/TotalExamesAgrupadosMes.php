<?php

namespace Inside\Domain\TotalExamesAgrupadosMes;

use Inside\Domain\UsuarioLogado;
use Inside\Domain\Executivos\Executivos;
use Inside\Repositories\Contracts\VendaOrigemRepository;
use Inside\Domain\TotalExamesAgrupadosMes\Transformers\TotalExamesAgrupadosMesTransformer;
use Carbon\Carbon;
use \DB;

class TotalExamesAgrupadosMes
{
    private $user;
    private $executivos;
    private $vendaOrigemRepository;

    public function __construct(Executivos $executivos, VendaOrigemRepository $vendaOrigemRepository)
    {
        $this->executivos = $executivos;
        $this->vendaOrigemRepository = $vendaOrigemRepository;
    }

    public function setUser(UsuarioLogado $user)
    {
        $this->user = $user;
    }

    public function get(UsuarioLogado $user)
    {
        $this->setUser($user);
        $idExecutivo = $this->executivos->getIdExecutivo($user);

        $dataInicio = Carbon::now()->copy()->subMonth(6)->hour(0)->minute(0)->second(0);
        $dataFim = Carbon::now()->copy()->hour(23)->minute(59)->second(59);
        $differenceDataFimAndDataInicio = $dataFim->copy()->diffInDays($dataInicio) + 1;

        $results = $this->returnTotalExamesAgrupadosByUser($dataInicio->toDateTimeString(), $dataFim->toDateTimeString(), $idExecutivo);

        $totalExamesAgrupadosMesTransformer = new TotalExamesAgrupadosMesTransformer();
        return $totalExamesAgrupadosMesTransformer->transform($dataInicio, $dataFim, $differenceDataFimAndDataInicio, $results);
    }

    private function returnTotalExamesAgrupadosByUser($dataInicio, $dataFim, array $idExecutivo)
    {
        if (isset($this->user)) {
            switch ($this->user->getPerfilAcessoPorExtenso()) {
                case UsuarioLogado::ADMIN_PSY:
                    return $this->getTotalExamesAgrupadosPsyAdmin($dataInicio, $dataFim);
                break;

                case UsuarioLogado::EXECUTIVO_PSY:
                    return $this->getTotalExamesAgrupadosPsyNotAdmin($dataInicio, $dataFim, $idExecutivo);
                break;

                case UsuarioLogado::SUPERVISOR_PSY:
                    return $this->getTotalExamesAgrupadosPsyNotAdmin($dataInicio, $dataFim, $idExecutivo);
                break;
                case UsuarioLogado::GERENTE_PSY:
                    return $this->getTotalExamesAgrupadosPsyNotAdmin($dataInicio, $dataFim, $idExecutivo);
                break;

                case UsuarioLogado::ADMIN_PARDINI:
                    return $this->getTotalExamesAgrupadosPardini($dataInicio, $dataFim, $idExecutivo);
                break;

                case UsuarioLogado::EXECUTIVO_PARDINI:
                    return $this->getTotalExamesAgrupadosPardini($dataInicio, $dataFim, $idExecutivo);
                break;

                case UsuarioLogado::SUPERVISOR_PARDINI:
                    return $this->getTotalExamesAgrupadosPardini($dataInicio, $dataFim, $idExecutivo);
                break;
                case UsuarioLogado::GERENTE_PARDINI:
                    return $this->getTotalExamesAgrupadosPardini($dataInicio, $dataFim, $idExecutivo);
                break;

                default:
                    throw new \Exception("Erro, perfil de acesso desconhecido", 400);
                break;
            }
        }
        throw new \Exception("Favor setar um usuário antes de buscar a origem caged.", 400);
    }

    private function getTotalExamesAgrupadosPsyAdmin($dataInicio, $dataFim)
    {
        return $this->vendaOrigemRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where("data_inclusao", ">=", $dataInicio)
            ->where("data_inclusao", "<=", $dataFim);
        })
        ->groupBy("data_inclusao")
        ->orderBy("data_inclusao")
        ->all(["data_inclusao", DB::raw("IFNULL(MAX(quantidade), 0) AS quantidade")]);
    }

    private function getTotalExamesAgrupadosPardini($dataInicio, $dataFim, array $idExecutivo)
    {
        return $this->vendaOrigemRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where("data_inclusao", ">=", $dataInicio)
            ->where("data_inclusao", "<=", $dataFim);
        })
        ->with(["laboratorio"])
        ->whereHas("laboratorio", function ($query) use ($idExecutivo) {
            $query->whereIn('id_laboratorio', $idExecutivo);
        })
        ->groupBy("data_inclusao")
        ->orderBy("data_inclusao")
        ->all(["data_inclusao", DB::raw("IFNULL(MAX(quantidade), 0) AS quantidade")]);
    }

    private function getTotalExamesAgrupadosPsyNotAdmin($dataInicio, $dataFim, array $idExecutivo)
    {
        return $this->vendaOrigemRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where("data_inclusao", ">=", $dataInicio)
            ->where("data_inclusao", "<=", $dataFim);
        })
        ->with(["laboratorio"])
        ->whereHas("laboratorio", function ($query) use ($idExecutivo) {
            $query->whereIn('id_executivo_psy', $idExecutivo);
        })
        ->groupBy("data_inclusao")
        ->orderBy("data_inclusao")
        ->all(["data_inclusao", DB::raw("IFNULL(MAX(quantidade), 0) AS quantidade")]);
    }
}
