<?php

namespace Inside\Domain\PrecoMedio;

use Inside\Domain\UsuarioLogado;
use Inside\Domain\Executivos\Executivos;
use Inside\Repositories\Contracts\VendaOrigemRepository;
use Inside\Domain\PrecoMedio\Transformers\PrecoMedioTransformer;

use \DB;
use Carbon\Carbon;

class PrecoMedio
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

    public function getPrecoMedio(UsuarioLogado $user, Carbon $dataInicio = null, Carbon $dataFim = null)
    {
        $this->setUser($user);
        $idExecutivo = $this->executivos->getIdExecutivo($user);

        $precoMedioTransformer = new PrecoMedioTransformer();
        return  $precoMedioTransformer->transform($this->returnPrecoMedioByUser($idExecutivo, $dataInicio, $dataFim));
    }

    private function returnPrecoMedioByUser(array $idExecutivo, Carbon $dataInicio = null, Carbon $dataFim = null)
    {
        if (isset($this->user)) {
            switch ($this->user->getPerfilAcessoPorExtenso()) {
                case UsuarioLogado::ADMIN_PSY:
                    return $this->getPrecoMedioPsyAdmin($dataInicio, $dataFim);
                break;

                case UsuarioLogado::EXECUTIVO_PSY:
                    return $this->getPrecoMedioPsyNotAdmin($idExecutivo, $dataInicio, $dataFim);
                break;

                case UsuarioLogado::SUPERVISOR_PSY:
                    return $this->getPrecoMedioPsyNotAdmin($idExecutivo, $dataInicio, $dataFim);
                break;
                case UsuarioLogado::GERENTE_PSY:
                    return $this->getPrecoMedioPsyNotAdmin($idExecutivo, $dataInicio, $dataFim);
                break;

                case UsuarioLogado::ADMIN_PARDINI:
                    return $this->getPrecoMedioPardini($idExecutivo, $dataInicio, $dataFim);
                break;

                case UsuarioLogado::EXECUTIVO_PARDINI:
                    return $this->getPrecoMedioPardini($idExecutivo, $dataInicio, $dataFim);
                break;

                case UsuarioLogado::SUPERVISOR_PARDINI:
                    return $this->getPrecoMedioPardini($idExecutivo, $dataInicio, $dataFim);
                break;
                case UsuarioLogado::GERENTE_PARDINI:
                    return $this->getPrecoMedioPardini($idExecutivo, $dataInicio, $dataFim);
                break;

                default:
                    throw new \Exception("Erro, perfil de acesso desconhecido", 400);
                break;
            }
        }
        throw new \Exception("Favor setar um usuário antes de buscar a origem caged.", 400);
    }

    private function getPrecoMedioPsyAdmin(Carbon $dataInicio = null, Carbon $dataFim = null)
    {
        $dataInicio = $dataInicio == null? Carbon::now()->addDays(-30)->hour(0)->minute(0)->second(0) : $dataInicio;
        $dataFim = $dataFim == null? Carbon::now()->hour(23)->minute(59)->second(59): $dataFim;

        return $this->vendaOrigemRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where('data_inclusao', '>=', $dataInicio->toDateTimeString())
            ->where('data_inclusao', '<=', $dataFim->toDateTimeString())
            ->where('fluxo', '>', 1);
        })
        ->all([
            DB::raw("sum(total_venda) as total"),
            DB::raw("sum(quantidade) as quantidade"),
            DB::raw("(sum(total_venda) / sum(quantidade)) as preco_medio")
        ]);
    }

    private function getPrecoMedioPardini(array $idExecutivo, Carbon $dataInicio = null, Carbon $dataFim = null)
    {
        $dataInicio = $dataInicio == null? Carbon::now()->addDays(-30)->hour(0)->minute(0)->second(0) : $dataInicio;
        $dataFim = $dataFim == null? Carbon::now()->hour(23)->minute(59)->second(59): $dataFim;

        return $this->vendaOrigemRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where('data_inclusao', '>=', $dataInicio->toDateTimeString())
            ->where('data_inclusao', '<=', $dataFim->toDateTimeString())
            ->where('fluxo', '>', 1);
        })
        ->with(["laboratorio"])
        ->whereHas("laboratorio", function ($query) use ($idExecutivo) {
            $query->whereIn('id_laboratorio', $idExecutivo);
        })
        ->all([
            DB::raw("sum(total_venda) as total"),
            DB::raw("sum(quantidade) as quantidade"),
            DB::raw("(sum(total_venda) / sum(quantidade)) as preco_medio")
        ]);
    }

    private function getPrecoMedioPsyNotAdmin(array $idExecutivo, Carbon $dataInicio = null, Carbon $dataFim = null)
    {
        $dataInicio = $dataInicio == null? Carbon::now()->addDays(-30)->hour(0)->minute(0)->second(0) : $dataInicio;
        $dataFim = $dataFim == null? Carbon::now()->hour(23)->minute(59)->second(59): $dataFim;

        return $this->vendaOrigemRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where('data_inclusao', '>=', $dataInicio->toDateTimeString())
            ->where('data_inclusao', '<=', $dataFim->toDateTimeString())
            ->where('fluxo', '>', 1);
        })
        ->with(["laboratorio"])
        ->whereHas("laboratorio", function ($query) use ($idExecutivo) {
            $query->whereIn('id_executivo_psy', $idExecutivo);
        })
        ->all([
            DB::raw("sum(total_venda) as total"),
            DB::raw("sum(quantidade) as quantidade"),
            DB::raw("(sum(total_venda) / sum(quantidade)) as preco_medio")
        ]);
    }
}
