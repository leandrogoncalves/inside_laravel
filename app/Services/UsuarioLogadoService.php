<?php

namespace Inside\Services;

use Illuminate\Http\Request;
use Inside\Domain\UsuarioLogado;

class UsuarioLogadoService
{

    private $usuarioLogado;

    public function __construct(UsuarioLogado $usuarioLogado)
    {
        $this->usuarioLogado = $usuarioLogado;
    }

    public function getUsuarioLogadoData(Request $request)
    {
        try {
            $requestData = $this->getIdExecutivoAndPerfil($request);
            $this->usuarioLogado->setIdExecutivo($requestData["idExecutivo"])
                                ->setPerfilAcesso($requestData["perfilAcesso"]);
            return $this->usuarioLogado;
        } catch (\Exception $e) {
            return $e;
        }
    }

    private function getIdExecutivoAndPerfil(Request $request)
    {
        $perfilAcesso = isset($request->user()->perfil_acesso)?  $request->user()->perfil_acesso: "";
        $idExecutivo = isset($request->user()->id_executivo)?  $request->user()->id_executivo:0;

        return [
            'perfilAcesso' => $perfilAcesso,
            'idExecutivo' => $idExecutivo
        ];
    }
}
