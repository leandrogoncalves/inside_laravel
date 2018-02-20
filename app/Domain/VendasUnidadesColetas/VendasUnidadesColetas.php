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
    private $idExecutivos;

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

    public function getTotais(Carbon $dataInicio, Carbon $dataFim, UsuarioLogado $user, bool $isDefaultDate = true)
    {
        $this->idExecutivos = !empty($this->idExecutivos) ? $this->idExecutivos : $this->executivos->getIdExecutivo($user);

        if ($user->isUserPsy()) {
            $comVenda = $this->unidadesColetasComVenda->getUnidadesColetasPsy($dataInicio, $dataFim, $this->idExecutivos);
            $semVenda = $this->unidadesColetasSemVenda->getUnidadesColetasPsy($dataInicio, $dataFim, $this->idExecutivos);
            $nuncaVenderam = $this->unidadesColetasNuncaVenderam->getUnidadesColetasPsy($dataInicio, $dataFim, $this->idExecutivos);

            return collect([
                'unidadesColetasComVenda' => $comVenda,
                'unidadesColetasSemVenda' => $semVenda,
                'unidadesColetasNuncaVenderam' => $nuncaVenderam,
            ]);
        }

        if ($user->isUserPardini()) {
            $comVenda = $this->unidadesColetasComVenda->getUnidadesColetasPardini($dataInicio, $dataFim, $this->idExecutivos);
            $semVenda = $this->unidadesColetasSemVenda->getUnidadesColetasPardini($dataInicio, $dataFim, $this->idExecutivos);
            $nuncaVenderam = $this->unidadesColetasNuncaVenderam->getUnidadesColetasPardini($dataInicio, $dataFim, $this->idExecutivos);

            return collect([
                'unidadesColetasComVenda' => $comVenda,
                'unidadesColetasSemVenda' => $semVenda,
                'unidadesColetasNuncaVenderam' => $nuncaVenderam,
            ]);
        }

        throw new \Exception("Erro, perfil de acesso desconhecido", 400);
    }

    public function getTotaisDetail(Carbon $dataInicio, Carbon $dataFim, UsuarioLogado $user, bool $isDefaultDate = true)
    {
        $this->idExecutivos = !empty($this->idExecutivos) ? $this->idExecutivos : $this->executivos->getIdExecutivo($user);

        if ($user->isUserPsy()) {
            $nuncaVenderamDetail = $this->unidadesColetaNuncaVenderamDetail->getDetailPsy($this->idExecutivos);

            if ($isDefaultDate) {
                $comVendaDetail = $this->unidadesColetaComVendaDetail->getUnidadesColetaPsyDetail($this->idExecutivos);
            } else {
                $comVendaDetail = $this->unidadesColetaPsyNotDefaultDate($dataInicio, $dataFim, $this->idExecutivos);
            }

            return collect([
                'unidadesColetasDetalhes' => $comVendaDetail
            ]);
        }

        if ($user->isUserPardini()) {
            $nuncaVenderamDetail = $this->unidadesColetaNuncaVenderamDetail->getDetailPardini($this->idExecutivos);

            if ($isDefaultDate) {
                $comVendaDetail = $this->unidadesColetaComVendaDetail->getUnidadesColetaPardiniDetail($this->idExecutivos);
            } else {
                $comVendaDetail = $this->unidadesColetaPardiniNotDefaultDate($dataInicio, $dataFim, $this->idExecutivos);
            }

            return collect([
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
