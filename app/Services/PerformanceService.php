<?php
/**
 * Created by PhpStorm.
 * User: leandro-psychemedics
 * Date: 17/02/18
 * Time: 18:56
 */

namespace Inside\Services;

use Illuminate\Http\Request;
use Inside\Domain\TotaisUnidadeColeta\TotaisUnidadeColeta;

class PerformanceService
{
    private $usuarioLogadoService;
    private $totaisUnidadeColeta;

    public function __construct(UsuarioLogadoService $usuarioLogadoService, TotaisUnidadeColeta $totaisUnidadeColeta)
    {
        $this->usuarioLogadoService = $usuarioLogadoService;
        $this->totaisUnidadeColeta = $totaisUnidadeColeta;
    }

    public function getData(Request $request)
    {

        $user = $this->usuarioLogadoService->getUsuarioLogadoData($request);

        $this->totaisUnidadeColeta->setUser($user);
        $this->totaisUnidadeColeta->setPeriodo($request);

        $total_uc_com_venda     = $this->totaisUnidadeColeta->totalComVenda();
        $total_uc_sem_venda     = $this->totaisUnidadeColeta->totalSemVenda();
        $total_uc_nunca_vendeu  = $this->totaisUnidadeColeta->totalNuncaVendeu();

        return collect([
            'total_uc_com_venda' => $total_uc_com_venda,
            'total_uc_sem_venda' => $total_uc_sem_venda,
            'total_uc_nunca_vendeu' => $total_uc_nunca_vendeu,
        ]);
    }

}