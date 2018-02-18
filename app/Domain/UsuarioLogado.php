<?php

namespace Inside\Domain;

use Exception;
use Inside\Repositories\Contracts\UsuarioRepository;

class UsuarioLogado
{
    private $perfilAcesso;
    private $idExecutivo;
    private $usuarioRepository;
    private $executivo;

    const PERFIL_ACESSO = [
        "ADMIN-PSY" => "admin",
        "EXECUTIVO-PSY" => "exec-psy",
        "SUPERVISOR-PSY" => "sup-psy",
        "GERENTE-PSY" => "ger-psy",
        "ADMIN-PARDINI" => "admin-pard",
        "EXECUTIVO-PARDINI" => "executivo",
        "SUPERVISOR-PARDINI" => "supervisor",
        "GERENTE-PARDINI" => "gerente",
    ];

    const ADMIN_PSY = 'ADMIN-PSY';
    const EXECUTIVO_PSY = 'EXECUTIVO-PSY';
    const SUPERVISOR_PSY = 'SUPERVISOR-PSY';
    const GERENTE_PSY = 'GERENTE-PSY';
    const ADMIN_PARDINI = 'ADMIN-PARDINI';
    const EXECUTIVO_PARDINI = 'EXECUTIVO-PARDINI';
    const SUPERVISOR_PARDINI = 'SUPERVISOR-PARDINI';
    const GERENTE_PARDINI = 'GERENTE-PARDINI';

    public function __construct(string $perfilAcesso = null,
                                int $idExecutivo = 0,
                                UsuarioRepository $usuarioRepository
                                )
    {
        $perfilAcesso !== null? $this->setPerfilAcesso($perfilAcesso) : null;
        $idExecutivo > 0? $this->setIdExecutivo($idExecutivo) : null;
        $this->usuarioRepository = $usuarioRepository;
    }

    public function isUserPsy()
    {
        switch ($this->perfilAcesso) {
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
                return false;
                break;
            case 'executivo':
                return false;
                break;
            case 'supervisor':
                return false;
                break;
            case 'gerente':
                return false;
                break;
            default:
                return false;
                break;
        }
    }

    public function isUserPardini()
    {
        switch ($this->perfilAcesso) {
            case 'admin':
            return false;
            break;
            case 'exec-psy':
            return false;
            break;
            case 'sup-psy':
            return false;
            break;
            case 'ger-psy':
            return false;
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
        return ( (isset($idExecutivo)  && $idExecutivo > 0) || ($this->perfilAcesso === self::ADMIN_PSY || $this->perfilAcesso === self::ADMIN_PARDINI)) ? true: false;
    }

    /**
    * Get the value of perfilAcesso
    */
    public function getPerfilAcesso()
    {
        return $this->perfilAcesso;
    }

    public function getPerfilAcessoPorExtenso()
    {
        return array_search($this->perfilAcesso, self::PERFIL_ACESSO);
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
        } catch (\Excetion $e) {
            return $e;
        }
    }



}
