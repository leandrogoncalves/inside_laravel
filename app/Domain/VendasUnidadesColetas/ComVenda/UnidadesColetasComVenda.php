<?php

namespace Inside\Domain\VendasUnidadesColetas\ComVenda;

use Inside\Repositories\Contracts\VendaLaboratorioRepository;
use Carbon\Carbon;
use \DB;

class UnidadesColetasComVenda
{
    private $repository;

    public function __construct(VendaLaboratorioRepository $vendaLaboratorioRepository)
    {
        $this->vendaLaboratorioRepository = $vendaLaboratorioRepository;
    }

    public function getUnidadesColetasPsy(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
    }

    public function getUnidadesColetasPardini(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        return "xana";
    }
}
