<?php

namespace Inside\Services\SolicitacoesExames;

use Inside\Models\Usuario;
use Exception;

class UsuarioLogado
{
    private $perfilAcesso;
    private $idExecutivo;

    public function __construct(string $perfilAcesso = null, int $idExecutivo = 0)
    {
        $perfilAcesso !== null? $this->setPerfilAcesso($perfilAcesso) : null;
        $idExecutivo > 0? $this->setIdExecutivo($idExecutivo) : null;
    }

    private function perfilAcessoValido($perfil)
    {
        switch ($perfil) {
            case 'admin':
                return true;
                break;
            case 'exec-psy':
                return true;
                break;
            case 'sup-psy':
                return true;
                break;
            case 'ger-psy':
                return true;
                break;
            case 'admin-pard':
                return true;
                break;
            case 'executivo':
                return true;
                break;
            case 'supervisor':
                return true;
                break;
            case 'gerente':
                return true;
                break;
            default:
                return false;
                break;
        }
    }

    private function idExecutivoValido($idExecutivo)
    {
        return $idExecutivo > 0;
    }

    /**
     * Get the value of perfilAcesso
     */
    public function getPerfilAcesso()
    {
        return $this->perfilAcesso;
    }

    /**
     * Set the value of perfilAcesso
     *
     * @return  self
     */
    public function setPerfilAcesso($perfilAcesso)
    {
        try {
            if ($this->perfilAcessoValido($perfilAcesso)) {
                $this->perfilAcesso = $perfilAcesso;
                return $this;
            } else {
                throw new Exception("Erro, perfil de Acesso inválido", 400);
            }
        } catch (Excetion $e) {
            return $e;
        }
    }

    /**
     * Get the value of idExecutivo
     */
    public function getIdExecutivo()
    {
        return $this->idExecutivo;
    }

    /**
     * Set the value of idExecutivo
     *
     * @return  self
     */
    public function setIdExecutivo($idExecutivo)
    {
        try {
            if ($this->idExecutivoValido($idExecutivo)) {
                $this->idExecutivo = $idExecutivo;
                return $this;
            } else {
                throw new Exception("Erro, id de Executivo Inválido", 400);
            }
        } catch (Excetion $e) {
            return $e;
        }
    }
}
