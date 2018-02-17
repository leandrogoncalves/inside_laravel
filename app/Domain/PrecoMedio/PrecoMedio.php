<?php

namespace Inside\Domain\PrecoMedio;

use Inside\Domain\UsuarioLogado;
use Inside\Domain\Executivos\Executivos;
use Inside\Repositories\Contracts\VendaOrigemRepository;
use Inside\Domain\PrecoMedio\Transformers\PrecoMedioTransformer;
use \DB;

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

    public function getPrecoMedio(UsuarioLogado $user)
    {
        $this->setUser($user);
        $idExecutivo = $this->executivos->getIdExecutivo($user);

        $precoMedioTransformer = new PrecoMedioTransformer();
        return  $precoMedioTransformer->transform($this->returnPrecoMedioByUser($idExecutivo));
    }

    private function returnPrecoMedioByUser(array $idExecutivo)
    {
        if (isset($this->user)) {
            switch ($this->user->getPerfilAcessoPorExtenso()) {
                case UsuarioLogado::ADMIN_PSY:
                    return $this->getPrecoMedioPsyAdmin();
                break;

                case UsuarioLogado::EXECUTIVO_PSY:
                    return $this->getPrecoMedioPsyNotAdmin($idExecutivo);
                break;

                case UsuarioLogado::SUPERVISOR_PSY:
                    return $this->getPrecoMedioPsyNotAdmin($idExecutivo);
                break;
                case UsuarioLogado::GERENTE_PSY:
                    return $this->getPrecoMedioPsyNotAdmin($idExecutivo);
                break;

                case UsuarioLogado::ADMIN_PARDINI:
                    return $this->getPrecoMedioPardini($idExecutivo);
                break;

                case UsuarioLogado::EXECUTIVO_PARDINI:
                    return $this->getPrecoMedioPardini($idExecutivo);
                break;

                case UsuarioLogado::SUPERVISOR_PARDINI:
                    return $this->getPrecoMedioPardini($idExecutivo);
                break;
                case UsuarioLogado::GERENTE_PARDINI:
                    return $this->getPrecoMedioPardini($idExecutivo);
                break;

                default:
                    throw new \Exception("Erro, perfil de acesso desconhecido", 400);
                break;
            }
        }
        throw new \Exception("Favor setar um usuário antes de buscar a origem caged.", 400);
    }

    private function getPrecoMedioPsyAdmin()
    {
        return $this->vendaOrigemRepository
        ->scopeQuery(function ($query) {
            return $query
            ->whereRaw("data_inclusao BETWEEN SUBDATE(DATE(NOW()), INTERVAL 30 DAY) AND DATE(NOW())");
        })
        ->all([
            DB::raw("sum(total_venda) as total"),
            DB::raw("sum(quantidade) as quantidade"),
            DB::raw("(sum(total_venda) / sum(quantidade)) as preco_medio")
        ]);
    }

    private function getPrecoMedioPardini(array $idExecutivo)
    {
        return $this->vendaOrigemRepository
        ->scopeQuery(function ($query) {
            return $query
            ->whereRaw("data_inclusao BETWEEN SUBDATE(DATE(NOW()), INTERVAL 30 DAY) AND DATE(NOW())");
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

    private function getPrecoMedioPsyNotAdmin(array $idExecutivo)
    {
        return $this->vendaOrigemRepository
        ->scopeQuery(function ($query) {
            return $query
            ->whereRaw("data_inclusao BETWEEN SUBDATE(DATE(NOW()), INTERVAL 30 DAY) AND DATE(NOW())");
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
