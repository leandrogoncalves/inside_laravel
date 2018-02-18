<?php

namespace Inside\Domain\VendasUnidadesColetas;

use Inside\Domain\VendasUnidadesColetas\ComVenda\UnidadesColetaComVendaDetail;
use Inside\Domain\VendasUnidadesColetas\ComVenda\UnidadesColetasComVenda;
use Inside\Domain\VendasUnidadesColetas\SemVenda\UnidadesColetasSemVenda;
use Inside\Domain\VendasUnidadesColetas\NuncaVenderam\UnidadesColetasNuncaVenderam;

use Inside\Domain\UsuarioLogado;
use Inside\Domain\Executivos\Executivos;
use Carbon\Carbon;
use \DB;

class VendasUnidadesColetas
{
    private $executivos;
    private $unidadesColetasComVenda;
    private $unidadesColetasSemVenda;
    private $unidadesColetasNuncaVenderam;

    public function __construct(Executivos $executivos,
                                UnidadesColetasComVenda $unidadesColetasComVenda,
                                UnidadesColetasSemVenda $unidadesColetasSemVenda,
                                UnidadesColetasNuncaVenderam $unidadesColetasNuncaVenderam,
                                UnidadesColetaComVendaDetail $unidadesColetaComVendaDetail
    )
    {
        $this->executivos = $executivos;
        $this->unidadesColetasComVenda = $unidadesColetasComVenda;
        $this->unidadesColetasSemVenda = $unidadesColetasSemVenda;
        $this->unidadesColetasNuncaVenderam = $unidadesColetasNuncaVenderam;
        $this->unidadesColetaComVendaDetail = $unidadesColetaComVendaDetail;
    }

    public function get(Carbon $dataInicio, Carbon $dataFim, UsuarioLogado $user, bool $isDefaultDate = true)
    {
        if ($isDefaultDate) {
            return $this->returnDataIfIsDefaultDate($dataInicio, $dataFim, $user);
        }

        return $this->returnDataIfIsNotDefaultDate($dataInicio, $dataFim, $user);
    }

    private function returnDataIfIsDefaultDate(Carbon $dataInicio, Carbon $dataFim, UsuarioLogado $user)
    {
        $comVenda = $semVenda = $nuncaVenderam = $comVendaDetail = 0;
        $idExecutivo = $this->executivos->getIdExecutivo($user);

        if ($user->isUserPsy()) {
            $comVenda = $this->unidadesColetasComVenda->getUnidadesColetasPsy($dataInicio, $dataFim, $idExecutivo);
            $semVenda = $this->unidadesColetasSemVenda->getUnidadesColetasPsy($dataInicio, $dataFim, $idExecutivo);
            $nuncaVenderam = $this->unidadesColetasNuncaVenderam->getUnidadesColetasPsy($dataInicio, $dataFim, $idExecutivo);
            $comVendaDetail = $this->unidadesColetaComVendaDetail->getUnidadesColetaPsyDetail($dataInicio, $dataFim, $idExecutivo);

            return collect([
                'unidadesColetasComVenda' => $comVenda,
                'unidadesColetasSemVenda' => $semVenda,
                'unidadesColetasNuncaVenderam' => $nuncaVenderam,
                'unidadesColetasDetalhes' => $comVendaDetail
            ]);
        }

        if ($user->isUserPardini()) {
            $comVenda = $this->unidadesColetasComVenda->getUnidadesColetasPardini($dataInicio, $dataFim, $idExecutivo);
            $semVenda = $this->unidadesColetasSemVenda->getUnidadesColetasPardini($dataInicio, $dataFim, $idExecutivo);
            $nuncaVenderam = $this->unidadesColetasNuncaVenderam->getUnidadesColetasPardini($dataInicio, $dataFim, $idExecutivo);
            $comVendaDetail = $this->unidadesColetaComVendaDetail->getUnidadesColetaPardiniDetail($dataInicio, $dataFim, $idExecutivo);

            return collect([
                'unidadesColetasComVenda' => $comVenda,
                'unidadesColetasSemVenda' => $semVenda,
                'unidadesColetasNuncaVenderam' => $nuncaVenderam,
                'unidadesColetasDetalhes' => $comVendaDetail
            ]);
        }

        throw new \Exception("Erro, perfil de acesso desconhecido", 400);
    }

    private function returnDataIfIsNotDefaultDate(Carbon $dataInicio, Carbon $dataFim, UsuarioLogado $user)
    {

    }
}
