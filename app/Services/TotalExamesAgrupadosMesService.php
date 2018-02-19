<?php

namespace Inside\Services;

use Illuminate\Http\Request;
use Inside\Domain\UsuarioLogado;
use Inside\Domain\TotalExamesAgrupadosMes\TotalExamesAgrupadosMes;

class TotalExamesAgrupadosMesService
{
    private $usuarioLogadoService;
    private $totalExamesAgrupadosMes;

    public function __construct(TotalExamesAgrupadosMes $totalExamesAgrupadosMes)
    {
        $this->totalExamesAgrupadosMes = $totalExamesAgrupadosMes;
    }

    public function getData(Request $request)
    {
        try {
            $perfilAcesso = $request->route('perfilAcesso');
            $idExecutivo = intval($request->route('idExecutivo'));
            $user = new UsuarioLogado($perfilAcesso, $idExecutivo);
            $totalExamesAgrupadosMes = $this->totalExamesAgrupadosMes->get($user);

            return $totalExamesAgrupadosMes;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
