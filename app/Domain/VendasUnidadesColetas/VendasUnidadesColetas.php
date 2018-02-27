<?php

namespace Inside\Domain\VendasUnidadesColetas;

use Inside\Domain\VendasUnidadesColetas\ComVenda\UnidadesColetaComVendaDetail;
use Inside\Domain\VendasUnidadesColetas\ComVenda\UnidadesColetasComVenda;
use Inside\Domain\VendasUnidadesColetas\MovidosExclusao\MovidosExclusao;
use Inside\Domain\VendasUnidadesColetas\SemVenda\UnidadesColetasSemVenda;
use Inside\Domain\VendasUnidadesColetas\SemVenda\UnidadesColetaSemVendaDetail;
use Inside\Domain\VendasUnidadesColetas\NuncaVenderam\UnidadesColetasNuncaVenderam;
use Inside\Domain\VendasUnidadesColetas\NuncaVenderam\UnidadesColetaNuncaVenderamDetail;

use Inside\Domain\UsuarioLogado;
use Inside\Domain\Executivos\Executivos;
use Carbon\Carbon;
use \DB;

class VendasUnidadesColetas
{
    private $executivos;
    private $unidadesColetasComVenda;
    private $unidadesColetasSemVenda;
    private $unidadesColetaSemVendaDetail;
    private $unidadesColetasNuncaVenderam;
    private $unidadesColetaNuncaVenderamDetail;
    private $unidadesColetaComVendaDetail;
    private $idExecutivos;
    private $movidosExclusao;

    const MOVIDO_EXCLUSAO = 1;
    const NUNCA_VENDEU = 1;

    public function __construct(Executivos $executivos,
                                UnidadesColetasComVenda $unidadesColetasComVenda,
                                UnidadesColetasSemVenda $unidadesColetasSemVenda,
                                UnidadesColetaSemVendaDetail $unidadesColetaSemVendaDetail,
                                UnidadesColetasNuncaVenderam $unidadesColetasNuncaVenderam,
                                UnidadesColetaNuncaVenderamDetail $unidadesColetaNuncaVenderamDetail,
                                UnidadesColetaComVendaDetail $unidadesColetaComVendaDetail,
                                MovidosExclusao $movidosExclusao)
    {
        $this->executivos = $executivos;
        $this->unidadesColetasComVenda = $unidadesColetasComVenda;
        $this->unidadesColetasSemVenda = $unidadesColetasSemVenda;
        $this->unidadesColetaSemVendaDetail = $unidadesColetaSemVendaDetail;
        $this->unidadesColetasNuncaVenderam = $unidadesColetasNuncaVenderam;
        $this->unidadesColetaNuncaVenderamDetail = $unidadesColetaNuncaVenderamDetail;
        $this->unidadesColetaComVendaDetail = $unidadesColetaComVendaDetail;
        $this->movidosExclusao = $movidosExclusao;
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

    public function getTotalComVendaDetail(Carbon $dataInicio, Carbon $dataFim, UsuarioLogado $user, bool $isDefaultDate = true)
    {
        $this->idExecutivos = !empty($this->idExecutivos) ? $this->idExecutivos : $this->executivos->getIdExecutivo($user);

        if ($user->isUserPsy()) {
            $comVendaDetail = $this->unidadesColetaComVendaDetail->getUnidadesColetaPsyDetail($this->idExecutivos);
            return  $comVendaDetail;
        }

        if ($user->isUserPardini()) {
            $comVendaDetail = $this->unidadesColetaComVendaDetail->getUnidadesColetaPardiniDetail($this->idExecutivos);
            return $comVendaDetail;
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

    public function getNuncaVenderamDetail(UsuarioLogado $user)
    {
        $this->idExecutivos = !empty($this->idExecutivos) ? $this->idExecutivos : $this->executivos->getIdExecutivo($user);

        if ($user->isUserPsy()) {

            $nuncaVenderamDetail = $this->unidadesColetaNuncaVenderamDetail->getDetailPsy($this->idExecutivos);

            return $nuncaVenderamDetail;
        }

        if ($user->isUserPardini()) {

            $nuncaVenderamDetail =  $this->unidadesColetaNuncaVenderamDetail->getDetailPardini($this->idExecutivos);

            return $nuncaVenderamDetail;
        }

        throw new \Exception("Erro, perfil de acesso desconhecido", 400);
    }

    public function getLabsSemVendaDetail(UsuarioLogado $user)
    {
        $this->idExecutivos = !empty($this->idExecutivos) ? $this->idExecutivos : $this->executivos->getIdExecutivo($user);

        if ($user->isUserPsy()) {

            $unidadesColetaSemVendaDetail = $this->unidadesColetaSemVendaDetail->getDetailPsy($this->idExecutivos);

            return $unidadesColetaSemVendaDetail;
        }

        if ($user->isUserPardini()) {

            $unidadesColetaSemVendaDetail =  $this->unidadesColetaSemVendaDetail->getDetailPardini($this->idExecutivos);

            return $unidadesColetaSemVendaDetail;
        }

        throw new \Exception("Erro, perfil de acesso desconhecido", 400);
    }

    public function getMovidosExclusaoDetail(UsuarioLogado $user)
    {
        $this->idExecutivos = !empty($this->idExecutivos) ? $this->idExecutivos : $this->executivos->getIdExecutivo($user);

        if ($user->isUserPsy()) {

            $movidosExclusaoDetail = $this->movidosExclusao->getDetailPsy($this->idExecutivos);

            return $movidosExclusaoDetail;
        }

        if ($user->isUserPardini()) {

            $movidosExclusaoDetail =  $this->movidosExclusao->getDetailPardini($this->idExecutivos);

            return $movidosExclusaoDetail;
        }

        throw new \Exception("Erro, perfil de acesso desconhecido", 400);
    }

}
