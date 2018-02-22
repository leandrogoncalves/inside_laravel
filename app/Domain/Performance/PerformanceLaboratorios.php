<?php

namespace Inside\Domain\Performance;

use Inside\Domain\Performance\PerformanceLaboratorioNewDates\PerformanceLaboratorioNewDates;

use Inside\Domain\UsuarioLogado;
use Carbon\Carbon;

class PerformanceLaboratorios
{
    private $performanceLaboratorioNewDates;

    public function __construct(PerformanceLaboratorioNewDates $performanceLaboratorioNewDates)
    {
        $this->performanceLaboratorioNewDates = $performanceLaboratorioNewDates;
    }

    public function get(Carbon $dataInicio, Carbon $dataFim, UsuarioLogado $user)
    {
        if (Carbon::now()->toDateString() === $dataInicio->toDateString()) {
            return $this->getPsy($dataInicio, $dataFim, $user);
        }

        if (Carbon::now() > $dataInicio) {
            return $this->performanceLaboratorioNewDates->get($dataInicio, $dataFim, $user);
        }

        throw new \Exception("Periodo informado inválido", 400);
    }
}
