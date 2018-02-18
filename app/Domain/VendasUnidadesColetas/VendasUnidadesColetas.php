<?php

namespace Inside\Domain\VendasUnidadesColetas;

use Inside\Domain\VendasUnidadesColetas\ComVenda\UnidadesColetaComVendaDetail;
use Inside\Domain\VendasUnidadesColetas\ComVenda\UnidadesColetasComVenda;

use Inside\Domain\UsuarioLogado;
use Inside\Domain\Executivos\Executivos;
use Carbon\Carbon;
use \DB;

class VendasUnidadesColetas
{
    private $executivos;
    private $unidadesColetasComVenda;

    public function __construct(Executivos $executivos,
                                UnidadesColetasComVenda $unidadesColetasComVenda,
                                UnidadesColetaComVendaDetail $unidadesColetaComVendaDetail
    )
    {
        $this->executivos = $executivos;
        $this->unidadesColetasComVenda = $unidadesColetasComVenda;
        $this->unidadesColetaComVendaDetail = $unidadesColetaComVendaDetail;
    }

    public function get(Carbon $dataInicio, Carbon $dataFim, UsuarioLogado $user)
    {
        dd($user);
        $idExecutivo = $this->executivos->getIdExecutivo($user);
        $comVenda = $semVenda = $nuncaVenderam = $comVendaDetail = 0;

        if ($user->isUserPsy()) {
//            $comVenda = $this->unidadesColetasComVenda->getUnidadesColetasPsy($dataInicio, $dataFim, $idExecutivo);
//            $semVenda = $this->unidadesColetasComVenda->getUnidadesColetasPsy($dataInicio, $dataFim, $idExecutivo);
//            $nuncaVenderam = $this->unidadesColetasComVenda->getUnidadesColetasPsy($dataInicio, $dataFim, $idExecutivo);
            $comVendaDetail = $this->unidadesColetaComVendaDetail->getUnidadesColetasPsyDetail($dataInicio, $dataFim, $idExecutivo);
        }

        if ($user->isUserPardini()) {
            $comVenda = $this->unidadesColetasComVenda->getUnidadesColetasPardini($dataInicio, $dataFim, $idExecutivo);
            $semVenda = $this->unidadesColetasComVenda->getUnidadesColetasPardini($dataInicio, $dataFim, $idExecutivo);
            $nuncaVenderam = $this->unidadesColetasComVenda->getUnidadesColetasPardini($dataInicio, $dataFim, $idExecutivo);
            $comVendaDetail = $this->unidadesColetaComVendaDetail->getUnidadesColetasPardiniDetail($dataInicio, $dataFim, $idExecutivo);
        }

        return collect([
            'comVenda' => $comVenda,
            'semVenda' => $semVenda,
            'nuncaVenderam' => $nuncaVenderam,
            'comVendaDetail' => $comVendaDetail,
        ]);
    }
}
