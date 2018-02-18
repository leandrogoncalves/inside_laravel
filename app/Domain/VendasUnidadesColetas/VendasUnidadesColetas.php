<?php

namespace Inside\Domain\VendasUnidadesColetas;

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

    public function __construct(Executivos $executivos, UnidadesColetasComVenda $unidadesColetasComVenda, UnidadesColetasSemVenda $unidadesColetasSemVenda, UnidadesColetasNuncaVenderam $unidadesColetasNuncaVenderam)
    {
        $this->executivos = $executivos;
        $this->unidadesColetasComVenda = $unidadesColetasComVenda;
        $this->unidadesColetasSemVenda = $unidadesColetasSemVenda;
        $this->unidadesColetasNuncaVenderam = $unidadesColetasNuncaVenderam;
    }

    public function get(Carbon $dataInicio, Carbon $dataFim, UsuarioLogado $user)
    {
        $idExecutivo = $this->executivos->getIdExecutivo($user);

        if ($user->isUserPsy()) {
            $comVenda = $this->unidadesColetasComVenda->getUnidadesColetasPsy($dataInicio, $dataFim, $idExecutivo);
            $semVenda = $this->unidadesColetasSemVenda->getUnidadesColetasPsy($dataInicio, $dataFim, $idExecutivo);
            $nuncaVenderam = $this->unidadesColetasNuncaVenderam->getUnidadesColetasPsy($dataInicio, $dataFim, $idExecutivo);

            return collect([
                'unidadesColetasComVenda' => $comVenda,
                'unidadesColetasSemVenda' => $semVenda,
                'unidadesColetasNuncaVenderam' => $nuncaVenderam,
            ]);
        }

        if ($user->isUserPardini()) {
            $comVenda = $this->unidadesColetasComVenda->getUnidadesColetasPardini($dataInicio, $dataFim, $idExecutivo);
            $semVenda = $this->unidadesColetasSemVenda->getUnidadesColetasPardini($dataInicio, $dataFim, $idExecutivo);
            $nuncaVenderam = $this->unidadesColetasNuncaVenderam->getUnidadesColetasPardini($dataInicio, $dataFim, $idExecutivo);

            return collect([
                'unidadesColetasComVenda' => $comVenda,
                'unidadesColetasSemVenda' => $semVenda,
                'unidadesColetasNuncaVenderam' => $nuncaVenderam,
            ]);
        }

        throw new \Exception("Erro, perfil de acesso desconhecido", 400);
    }
}
