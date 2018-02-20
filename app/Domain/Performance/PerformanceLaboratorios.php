<?php

namespace Inside\Domain\Performance;

use Inside\Domain\Executivos\Executivos;
use Inside\Domain\Performance\PerformanceLaboratorioNewDates\PerformanceLaboratorioNewDates;
use Inside\Domain\UsuarioLogado;

use Carbon\Carbon;

class PerformanceLaboratorios
{
    private $executivos;
    private $performanceLaboratorioNewDates;

    public function __construct(Executivos $executivos, PerformanceLaboratorioNewDates $performanceLaboratorioNewDates)
    {
        $this->executivos = $executivos;
        $this->performanceLaboratorioNewDates = $performanceLaboratorioNewDates;
    }

    public function get(Carbon $dataInicio, Carbon $dataFim, UsuarioLogado $user)
    {
        $idExecutivo = $this->executivos->getIdExecutivo($user);
        $user->setIdGerente($this->executivos->getIdGerente($user)['codigo_gerente']);

        return $this->performanceLaboratorioNewDates->getPerformanceLaboratorioPsy($dataInicio, $dataFim, $idExecutivo, $user);
    }
}
