<?php

namespace Inside\Services\SolicitacoesExames;

use Inside\Services\SolicitacoesExames\UsuarioLogado;
use Inside\Services\SolicitacoesExames\Psy\Executivos as ExecutivosPsy;
use Inside\Services\SolicitacoesExames\Pardini\Executivos as ExecutivosPardini;

class Executivos
{
    protected $executivosPsy;
    protected $executivosPardini;

    public function __construct(ExecutivosPsy $executivosPsy, ExecutivosPsy $executivosPardini)
    {
        $this->executivosPsy = $executivosPsy;
        $this->executivosPardini = $executivosPardini;
    }

    public function getIdExecutivo(UsuarioLogado $user)
    {
        switch ($user->getPerfilAcessoPorExtenso()) {
            case UsuarioLogado::ADMIN_PSY:
            dd($user->getIdExecutivo());
            return $this->executivosPsy->getIdExecutivoByCodigoExecutivo($user->getIdExecutivo());
            break;

            case UsuarioLogado::EXECUTIVO_PSY:
            return $this->executivosPsy->getIdExecutivoByCodigoExecutivo($user->getIdExecutivo());
            break;

            case UsuarioLogado::SUPERVISOR_PSY:
            return $this->executivosPsy->getIdExecutivoByCodigoSupervisor($user->getIdExecutivo());
            break;
            case UsuarioLogado::GERENTE_PSY:
            return $this->executivosPsy->getIdExecutivoByCodigoGerente($user->getIdExecutivo());
            break;

            case UsuarioLogado::ADMIN_PARDINI:
            return false;
            break;
            case UsuarioLogado::EXECUTIVO_PARDINI:
            return false;
            break;
            case UsuarioLogado::SUPERVISOR_PARDINI:
            return false;
            break;
            case UsuarioLogado::GERENTE_PARDINI:
            return false;
            break;

            default:
            throw new \Exception("Erro, perfil de acesso desconhecido", 400);
            break;
        }
    }
}
