<?php
/**
 * Created by PhpStorm.
 * User: leandro-psychemedics
 * Date: 19/02/18
 * Time: 00:30
 */

namespace Inside\Domain\VendasUnidadesColetas\NuncaVenderam;

use Inside\Repositories\Contracts\VendaLaboratorioRepository;
use Inside\Repositories\Contracts\LaboratorioRepository;
use Carbon\Carbon;
use \DB;


class UnidadesColetaNuncaVenderamDetail
{
    private $vendaLaboratorioRepository;
    private $laboratorioRepository;

    public function __construct(VendaLaboratorioRepository $vendaLaboratorioRepository, LaboratorioRepository $laboratorioRepository)
    {
        $this->vendaLaboratorioRepository = $vendaLaboratorioRepository;
        $this->laboratorioRepository = $laboratorioRepository;
    }

    public function getDetailPsy(array $id_executivo)
    {
        return '';
    }

    public function getDetailPardini(array $id_executivo)
    {
        return '';
    }
}