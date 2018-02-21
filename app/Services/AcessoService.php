<?php

namespace Inside\Services;

use Illuminate\Http\Request;
use Inside\Domain\ObterTodosUsuarioService;
class AcessoService
{
    private $obterUsuarios;
    private $usuarioLogadoService;
    public function __construct(ObterTodosUsuarioService $usuarios, UsuarioLogadoService $usuarioLogadoService)
    {
        $this->obterUsuarios = $usuarios;
        $this->usuarioLogadoService = $usuarioLogadoService;
    }
    public function getData(Request $request)
    {
        $user = $this->obterUsuarios->getAllUsers($request);
        return $user;
    }
    public function getNewUser($id){

        $newUser = $this->obterUsuarios->getNewUser($id);
        return dd($newUser);
    }
}
