<?php

namespace Inside\Domain\Executivos;

use Inside\Domain\UsuarioLogado;
use Inside\Domain\Executivos\Psy\Executivos as ExecutivosPsy;
use Inside\Domain\Executivos\Pardini\Executivos as ExecutivosPardini;

class Executivos
{
    protected $executivosPsy;
    protected $executivosPardini;

    public function __construct(ExecutivosPsy $executivosPsy, ExecutivosPardini $executivosPardini)
    {
        $this->executivosPsy = $executivosPsy;
        $this->executivosPardini = $executivosPardini;
    }

    public function getIdExecutivo(UsuarioLogado $user)
    {
        switch ($user->getPerfilAcessoPorExtenso()) {
            case UsuarioLogado::ADMIN_PSY:
                return $this->executivosPsy->getIdExecutivoByAdmin();
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
                return $this->executivosPardini->getIdExecutivoByAdmin();
            break;

            case UsuarioLogado::EXECUTIVO_PARDINI:
                return $this->executivosPardini->getIdExecutivoByCodigoExecutivo($user->getIdExecutivo());
            break;

            case UsuarioLogado::SUPERVISOR_PARDINI:
                return $this->executivosPardini->getIdExecutivoByCodigoSupervisor($user->getIdExecutivo());
            break;
            case UsuarioLogado::GERENTE_PARDINI:
                return $this->executivosPardini->getIdExecutivoByCodigoGerente($user->getIdExecutivo());
            break;

            default:
                throw new \Exception("Erro, perfil de acesso desconhecido", 400);
            break;
        }
    }
}
