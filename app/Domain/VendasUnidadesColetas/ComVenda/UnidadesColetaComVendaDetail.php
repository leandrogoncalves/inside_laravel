<?php

namespace Inside\Domain\VendasUnidadesColetas\ComVenda;

use Inside\Repositories\Contracts\VendaLaboratorioRepository;
use Inside\Repositories\Contracts\LaboratorioRepository;
use Carbon\Carbon;
use \DB;


class UnidadesColetaComVendaDetail
{
    private $repository;

    public function __construct(VendaLaboratorioRepository $vendaLaboratorioRepository,
                                LaboratorioRepository $laboratorioRepository)
    {
        $this->vendaLaboratorioRepository = $vendaLaboratorioRepository;
        $this->laboratorioRepository = $laboratorioRepository;
    }

    public function get(UsuarioLogado $user)
    {
        $idExecutivo = $this->executivos->getIdExecutivo($user);
        $dataInicio = Carbon::now()->copy()->subMonth(1)->hour(0)->minute(0)->second(0);
        $dataFim = Carbon::now()->copy()->hour(23)->minute(59)->second(59);

        dd($this->unidadesColetasComVenda->getUnidadesColetasPsy($dataInicio, $dataFim, $idExecutivo));
    }
}