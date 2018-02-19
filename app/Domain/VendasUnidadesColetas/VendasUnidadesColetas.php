<?php

namespace Inside\Domain\VendasUnidadesColetas;

use Inside\Domain\VendasUnidadesColetas\ComVenda\UnidadesColetaComVendaDetail;
use Inside\Domain\VendasUnidadesColetas\ComVenda\UnidadesColetasComVenda;
use Inside\Domain\VendasUnidadesColetas\SemVenda\UnidadesColetasSemVenda;
use Inside\Domain\VendasUnidadesColetas\NuncaVenderam\UnidadesColetasNuncaVenderam;
use Inside\Domain\VendasUnidadesColetas\NuncaVenderam\UnidadesColetaNuncaVenderamDetail;
use Inside\Domain\VendasUnidadesColetas\PerformanceLaboratorioNewDates\PerformanceLaboratorioNewDates;

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
    private $unidadesColetaComVendaDetail;
    private $performanceLaboratorioNewDates;

    public function __construct(Executivos $executivos,
                                UnidadesColetasComVenda $unidadesColetasComVenda,
                                UnidadesColetasSemVenda $unidadesColetasSemVenda,
                                UnidadesColetasNuncaVenderam $unidadesColetasNuncaVenderam,
                                UnidadesColetaNuncaVenderamDetail $unidadesColetaNuncaVenderamDetail,
                                UnidadesColetaComVendaDetail $unidadesColetaComVendaDetail,
                                PerformanceLaboratorioNewDates $performanceLaboratorioNewDates
                                )
    {
        $this->executivos = $executivos;
        $this->unidadesColetasComVenda = $unidadesColetasComVenda;
        $this->unidadesColetasSemVenda = $unidadesColetasSemVenda;
        $this->unidadesColetasNuncaVenderam = $unidadesColetasNuncaVenderam;
        $this->unidadesColetaNuncaVenderamDetail = $unidadesColetaNuncaVenderamDetail;
        $this->unidadesColetaComVendaDetail = $unidadesColetaComVendaDetail;
        $this->performanceLaboratorioNewDates = $performanceLaboratorioNewDates;
    }

    public function get(Carbon $dataInicio, Carbon $dataFim, UsuarioLogado $user, bool $isDefaultDate = true)
    {
        $idExecutivo = $this->executivos->getIdExecutivo($user);

        if ($user->isUserPsy()) {
            $comVenda = $this->unidadesColetasComVenda->getUnidadesColetasPsy($dataInicio, $dataFim, $idExecutivo);
            $semVenda = $this->unidadesColetasSemVenda->getUnidadesColetasPsy($dataInicio, $dataFim, $idExecutivo);
            $nuncaVenderam = $this->unidadesColetasNuncaVenderam->getUnidadesColetasPsy($dataInicio, $dataFim, $idExecutivo);
            $nuncaVenderamDetail = $this->unidadesColetaNuncaVenderamDetail->getDetailPsy($idExecutivo);

            if ($isDefaultDate) {
                $comVendaDetail = $this->unidadesColetaComVendaDetail->getUnidadesColetaPsyDetail($idExecutivo);
            } else {
                $comVendaDetail = $this->unidadesColetaPsyNotDefaultDate($dataInicio, $dataFim, $idExecutivo);
            }

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
            $nuncaVenderamDetail = $this->unidadesColetaNuncaVenderamDetail->getDetailPardini($idExecutivo);

            if ($isDefaultDate) {
                $comVendaDetail = $this->unidadesColetaComVendaDetail->getUnidadesColetaPardiniDetail($idExecutivo);
            } else {
                $comVendaDetail = $this->unidadesColetaPardiniNotDefaultDate($dataInicio, $dataFim, $idExecutivo);
            }

            return collect([
                'unidadesColetasComVenda' => $comVenda,
                'unidadesColetasSemVenda' => $semVenda,
                'unidadesColetasNuncaVenderam' => $nuncaVenderam,
                'unidadesColetasDetalhes' => $comVendaDetail
            ]);
        }

        throw new \Exception("Erro, perfil de acesso desconhecido", 400);
    }

    private function unidadesColetaPsyNotDefaultDate(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        return $this->performanceLaboratorioNewDates->getPsy($dataInicio, $dataFim, $idExecutivo);
    }

    private function unidadesColetaPardiniNotDefaultDate(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        return $this->performanceLaboratorioNewDates->getPardini($dataInicio, $dataFim, $idExecutivo);
    }
}
