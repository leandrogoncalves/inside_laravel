<?php
/**
 * Created by PhpStorm.
 * User: leandro-psychemedics
 * Date: 19/02/18
 * Time: 00:30
 */

namespace Inside\Domain\VendasUnidadesColetas\NuncaVenderam;


class UnidadesColetaNuncaVenderamDetail
{
    private $vendaLaboratorioRepository;
    private $laboratorioRepository;

    public function __construct(VendaLaboratorioRepository $vendaLaboratorioRepository, LaboratorioRepository $laboratorioRepository)
    {
        $this->vendaLaboratorioRepository = $vendaLaboratorioRepository;
        $this->laboratorioRepository = $laboratorioRepository;
    }

}