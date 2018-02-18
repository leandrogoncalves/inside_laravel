<?php

namespace Inside\Services;

use Illuminate\Http\Request;
use Inside\Services\UsuarioLogadoService;
use Inside\Domain\TotalExamesAgrupadosMes\TotalExamesAgrupadosMes;

class TotalExamesAgrupadosMesService
{
    private $usuarioLogadoService;
    private $totalExamesAgrupadosMes;

    public function __construct(UsuarioLogadoService $usuarioLogadoService, TotalExamesAgrupadosMes $totalExamesAgrupadosMes)
    {
        $this->usuarioLogadoService = $usuarioLogadoService;
        $this->totalExamesAgrupadosMes = $totalExamesAgrupadosMes;
    }

    public function getData(Request $request)
    {
        try {
            $user = $this->usuarioLogadoService->getUsuarioLogadoData($request);
            $totalExamesAgrupadosMes = $this->totalExamesAgrupadosMes->get($user);

            return $totalExamesAgrupadosMes;
        } catch (\Excetion $e) {
            return $e;
        }
    }
}
