<?php

namespace Inside\Domain\VendasUnidadesColetas\PerformanceLaboratorioNewDates;

use Inside\Domain\VendasUnidadesColetas\PerformanceLaboratorioNewDates\Psy\PerformanceLaboratorio as PerformanceLaboratorioPsy;
use Inside\Domain\VendasUnidadesColetas\PerformanceLaboratorioNewDates\Pardini\PerformanceLaboratorio as PerformanceLaboratorioPardini;

class PerformanceLaboratorioNewDates
{
    private $performanceLaboratorioPsy;
    private $performanceLaboratorioPardini;

    public function __construct(PerformanceLaboratorioPsy $performanceLaboratorioPsy, PerformanceLaboratorioPardini $performanceLaboratorioPardini)
    {
        $this->performanceLaboratorioPsy = $performanceLaboratorioPsy;
        $this->performanceLaboratorioPardini = $performanceLaboratorioPardini;
    }

    public function getPerformanceLaboratorioPsy(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo, UsuarioLogado $user)
    {
        return $this->performanceLaboratorioPsy->get($dataInicio, $dataFim, $idExecutivo);
    }

    public function getPerformanceLaboratorioPardini(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo, UsuarioLogado $user)
    {
        return $this->performanceLaboratorioPardini->get($dataInicio, $dataFim, $idExecutivo);
    }
}
