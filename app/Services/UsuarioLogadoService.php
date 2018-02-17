<?php

namespace Inside\Services;

use Illuminate\Http\Request;
use Inside\Domain\UsuarioLogado;

class UsuarioLogadoService
{
    public function getUsuarioLogadoData(Request $request)
    {
        try {
            $requestData = $this->getIdExecutivoAndPerfil($request);
            return new UsuarioLogado($requestData["perfilAcesso"], $requestData["idExecutivo"]);
        } catch (\Excetion $e) {
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
