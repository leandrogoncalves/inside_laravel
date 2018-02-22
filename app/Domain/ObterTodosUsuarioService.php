<?php

namespace Inside\Domain;

use Exception;
use Inside\Domain\UsuarioLogado;
use Inside\Repositories\Contracts\UsuarioRepository;
use PhpParser\Node\Expr\Array_;

class ObterTodosUsuarioService
{
    private $repositoryUsers;
    public function __construct(UsuarioRepository $repository)
    {
        $this->repositoryUsers = $repository;

    }
    public function getAllUsers( $request){
        $perfilAcesso = $request->user()->perfil_acesso;
        $idExecutivo =  !empty( $request->user()->id_executivo) ? $request->user()->id_executivo: 0;
        $user = new UsuarioLogado($perfilAcesso, $idExecutivo);
        $users = $this->getUsers($user);
        return $users;
    }
    public function getNewUser($email){
        \Auth::logout();
        $userdata = array(
            'email'     => $email,
            'password'  => 'inside01'
        );
        return  \Auth::attempt($userdata) ?  redirect('/home') :  redirect('/login');
    }
    public function getUsers(UsuarioLogado $user){
        switch ($user->getPerfilAcessoPorExtenso()) {
            case UsuarioLogado::ADMIN_PSY:
                return  $this->getUsersAdminPsy();
                break;
            case UsuarioLogado::SUPERVISOR_PSY:
                return  $this->getUsersSuperPsy($user->getIdExecutivo());
                break;
            case UsuarioLogado::GERENTE_PSY:
                return  $this->getUsersGerentePsy($user->getIdExecutivo());
                break;
            case UsuarioLogado::ADMIN_PARDINI:
                return  $this->getUsersAdminPardini();
                break;
            case UsuarioLogado::SUPERVISOR_PARDINI:
                return  $this->getUsersSuperPardini($user->getIdExecutivo());
                break;
            case UsuarioLogado::GERENTE_PARDINI:
                return  $this->getUsersGerentePardini($user->getIdExecutivo());
                break;
            default:
                throw new \Exception("Erro, Usuario sem permissão", 401);
                break;
        }
    }
    public function getUsersAdminPsy(){
        $executivo = $this->repositoryUsers->scopeQuery(function ($query) {
            return $query->where('log_inteligencia.usuario.email','LIKE', '%@%')
                ->join('psy_transp.vwNivelHierPsy','psy_transp.vwNivelHierPsy.codigo_executivo' ,
                    '=', 'log_inteligencia.usuario.id_executivo' )->groupBy('nome','email','ultimo_acesso','perfil_acesso');
        })->all(['nome','email','ultimo_acesso', 'perfil_acesso'])->toArray();

        $superVisor =  $this->repositoryUsers->scopeQuery(function ($query) {
            return $query->where('log_inteligencia.usuario.email','LIKE', '%@%')
                ->join('psy_transp.vwNivelHierPsy','psy_transp.vwNivelHierPsy.codigo_supervisor' ,
                    '=', 'log_inteligencia.usuario.id_executivo')->groupBy('nome','email','ultimo_acesso','perfil_acesso');
        })->all(['nome','email','ultimo_acesso', 'perfil_acesso'])->toArray();

        $gerente = $this->repositoryUsers->scopeQuery(function ($query) {
            return $query->where('log_inteligencia.usuario.email','LIKE', '%@%')
                ->join('psy_transp.vwNivelHierPsy','psy_transp.vwNivelHierPsy.codigo_gerente' ,
                    '=', 'log_inteligencia.usuario.id_executivo')->groupBy('nome','email','ultimo_acesso', 'perfil_acesso');
        })->all(['nome','email','ultimo_acesso', 'perfil_acesso'])->toArray();

        $data = array_merge($executivo, $superVisor, $gerente);
        return $data;
    }
    public function getUsersGerentePsy($id){

        $executivo = $this->repositoryUsers->scopeQuery(function ($query) use ($id) {
            return $query->where('log_inteligencia.usuario.email','LIKE', '%@%')
                ->join('psy_transp.vwNivelHierPsy','psy_transp.vwNivelHierPsy.codigo_executivo' ,
                    '=', 'log_inteligencia.usuario.id_executivo' )
                ->where('psy_transp.vwNivelHierPsy.codigo_gerente','=', $id)->groupBy('nome','email','ultimo_acesso','perfil_acesso');
        })->all(['nome','email','ultimo_acesso', 'perfil_acesso'])->toArray();

        $superVisor =  $this->repositoryUsers->scopeQuery(function ($query)use ($id) {
            return $query->where('log_inteligencia.usuario.email','LIKE', '%@%')
                ->join('psy_transp.vwNivelHierPsy','psy_transp.vwNivelHierPsy.codigo_supervisor' ,
                    '=', 'log_inteligencia.usuario.id_executivo')->groupBy('nome','email','ultimo_acesso','perfil_acesso')
                ->where('psy_transp.vwNivelHierPsy.codigo_gerente','=', $id)->groupBy('nome','email','ultimo_acesso','perfil_acesso');
        })->all(['nome','email','ultimo_acesso', 'perfil_acesso'])->toArray();
        $data = array_merge($executivo, $superVisor);
        return $data;
    }
    public function getUsersSuperPsy($id){
        $executivo = $this->repositoryUsers->scopeQuery(function ($query) use ($id) {
            return $query->where('log_inteligencia.usuario.email','LIKE', '%@%')
                ->join('psy_transp.vwNivelHierPsy','psy_transp.vwNivelHierPsy.codigo_executivo' ,
                    '=', 'log_inteligencia.usuario.id_executivo' )
                ->where('psy_transp.vwNivelHierPsy.codigo_supervisor','=', $id)->groupBy('nome','email','ultimo_acesso','perfil_acesso');
        })->all(['nome','email','ultimo_acesso', 'perfil_acesso'])->toArray();

        $data = $executivo;
        return $data;
    }

    public function getUsersSuperPardini($id){
        $executivo = $this->repositoryUsers->scopeQuery(function ($query) use ($id) {
            return $query->where('log_inteligencia.usuario.email','LIKE', '%@%')
                ->join('psy_transp.vwNivelHierPardini','psy_transp.vwNivelHierPardini.cod_executivo' ,
                    '=', 'log_inteligencia.usuario.id_executivo' )
                ->where('psy_transp.vwNivelHierPardini.cod_supervisor','=', $id)
                ->where('log_inteligencia.usuario.perfil','<>', 'psychemedics')->distinct();
        })->all(['nome','email','ultimo_acesso', 'perfil_acesso'])->toArray();

        $data = $executivo;
        return $data;
    }

    public  function  getUsersGerentePardini($id){
        $executivo = $this->repositoryUsers->scopeQuery(function ($query) use ($id) {
            return $query->where('log_inteligencia.usuario.email','LIKE', '%@%')
                ->join('psy_transp.vwNivelHierPardini','psy_transp.vwNivelHierPardini.cod_executivo' ,
                    '=', 'log_inteligencia.usuario.id_executivo' )
                ->where('psy_transp.vwNivelHierPardini.cod_gerente','=', $id)
                ->where('log_inteligencia.usuario.perfil','<>', 'psychemedics')->distinct();
        })->all(['nome','email','ultimo_acesso', 'perfil_acesso'])->toArray();
        $superVisor = $this->repositoryUsers->scopeQuery(function ($query) use ($id) {
            return $query->where('log_inteligencia.usuario.email','LIKE', '%@%')
                ->join('psy_transp.vwNivelHierPardini','psy_transp.vwNivelHierPardini.cod_supervisor' ,
                    '=', 'log_inteligencia.usuario.id_executivo' )
                ->where('psy_transp.vwNivelHierPardini.cod_gerente','=', $id)
                ->where('log_inteligencia.usuario.perfil','<>', 'psychemedics')->distinct();
        })->all(['nome','email','ultimo_acesso', 'perfil_acesso'])->toArray();
        $data = array_merge($executivo, $superVisor);
        return $data;
    }

    public function getUsersAdminPardini(){

        $executivo = $this->repositoryUsers->scopeQuery(function ($query) {
            return $query->where('log_inteligencia.usuario.email','LIKE', '%@%')
                ->join('psy_transp.vwNivelHierPardini','psy_transp.vwNivelHierPardini.cod_executivo' ,
                    '=', 'log_inteligencia.usuario.id_executivo' )
                ->where('log_inteligencia.usuario.perfil','<>', 'psychemedics')->distinct();
        })->all(['nome','email','ultimo_acesso', 'perfil_acesso'])->toArray();
        $superVisor = $this->repositoryUsers->scopeQuery(function ($query){
            return $query->where('log_inteligencia.usuario.email','LIKE', '%@%')
                ->join('psy_transp.vwNivelHierPardini','psy_transp.vwNivelHierPardini.cod_supervisor' ,
                    '=', 'log_inteligencia.usuario.id_executivo')
                ->where('log_inteligencia.usuario.perfil','<>', 'psychemedics')->distinct();
        })->all(['nome','email','ultimo_acesso', 'perfil_acesso'])->toArray();
        $gerente = $this->repositoryUsers->scopeQuery(function ($query){
            return $query->where('log_inteligencia.usuario.email','LIKE', '%@%')
                ->join('psy_transp.vwNivelHierPardini','psy_transp.vwNivelHierPardini.cod_gerente' ,
                    '=', 'log_inteligencia.usuario.id_executivo')
                ->where('log_inteligencia.usuario.perfil','<>', 'psychemedics')->distinct();
        })->all(['nome','email','ultimo_acesso', 'perfil_acesso'])->toArray();
        $data = array_merge($executivo, $superVisor, $gerente);
        return $data;
    }
}
