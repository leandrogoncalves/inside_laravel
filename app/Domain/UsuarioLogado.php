<?php

namespace Inside\Domain;

use Exception;

class UsuarioLogado
{
    private $perfilAcesso;
    private $idExecutivo;
    private $idGerente;

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

    const ID_GERENTE_LABORATORIO = 10;
    const ID_GERENTE_CORPORATIVO = 20;

    public function __construct(string $perfilAcesso = null, int $idExecutivo = 0, int $idGerente = 0)
    {
        $perfilAcesso !== null? $this->setPerfilAcesso($perfilAcesso) : null;
        $idExecutivo > 0? $this->setIdExecutivo($idExecutivo) : null;
        $idGerente > 0? $this->setIdGerente($idGerente) : null;
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

    public function isUserAdmin()
    {
        return $this->perfilAcesso === self::PERFIL_ACESSO[self::ADMIN_PSY] || $this->perfilAcesso === self::PERFIL_ACESSO[self::ADMIN_PARDINI]? true: false;
    }

    public function isUserAdminPsy()
    {
        return $this->perfilAcesso === self::PERFIL_ACESSO[self::ADMIN_PSY]? true: false;
    }

    public function isUserAdminPardini()
    {
        return $this->perfilAcesso === self::PERFIL_ACESSO[self::ADMIN_PARDINI]? true: false;
    }

    private function idExecutivoValido($idExecutivo)
    {
        return ( (isset($idExecutivo)  && $idExecutivo > 0) || ($this->perfilAcesso === self::PERFIL_ACESSO[ADMIN_PSY] || $this->perfilAcesso === self::PERFIL_ACESSO[self::ADMIN_PARDINI])) ? true: false;
    }

    private function idGerenteValido($idGerente)
    {
        return ($idGerente === self::ID_GERENTE_LABORATORIO || $idGerente === self::ID_GERENTE_CORPORATIVO)? true: false;
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
        } catch (\Exception $e) {
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
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
    * Get the value of idGerente
    */
    public function getIdGerente()
    {
        return $this->idGerente;
    }

    /**
    * Set the value of idGerente
    *
    * @return  self
    */
    public function setIdGerente($idGerente)
    {
        try {
            if ($this->idGerenteValido($idGerente)) {
                $this->idGerente = $idGerente;
                return $this;
            } else {
                throw new Exception("Erro, id de Gerente Inválido", 400);
            }
        } catch (\Exception $e) {
            return $e;
        }
    }
}
