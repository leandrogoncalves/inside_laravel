<?php

namespace Inside\Domain\Performance\PerformanceLaboratorioNewDates;

use Inside\Domain\Performance\PerformanceLaboratorioNewDates\Psy\PerformanceLaboratorio as PerformanceLaboratorioPsy;
use Inside\Domain\Performance\PerformanceLaboratorioNewDates\Pardini\PerformanceLaboratorio as PerformanceLaboratorioPardini;
use Inside\Domain\Performance\PerformanceLaboratorioNewDates\PerformanceLaboratorioPeriodos;
use Inside\Domain\Performance\Transformers\PerformanceTransformer;

use Carbon\Carbon;
use Inside\Domain\UsuarioLogado;

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
        $periodoB = $this->performanceLaboratorioPsy->get($dataInicio, $dataFim, $idExecutivo, $user);
        $datesPeriodoA = $this->getDatesPeriodoA($dataInicio, $dataFim);
        $periodoA = $this->performanceLaboratorioPsy->get($datesPeriodoA['dataInicio'], $datesPeriodoA['dataFim'], $idExecutivo, $user);

        return $this->returnData($periodoB, $periodoA);
    }

    private function getDatesPeriodoA(Carbon $dataInicio, Carbon $dataFim)
    {
        $differenceInDaysNegative = $dataFim->copy()->diffInDays($dataInicio);
        $differenceInDaysNegative = $differenceInDaysNegative * (-1);

        $dataFimPeriodoA = $dataInicio->copy()->addDays(-1);
        $dataInicioPeriodoA = $dataFimPeriodoA->copy()->addDays($differenceInDaysNegative);


        return ['dataInicio' => $dataInicioPeriodoA, 'dataFim' => $dataFimPeriodoA];
    }

    public function getPerformanceLaboratorioPardini(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo, UsuarioLogado $user)
    {
        $periodoB = $this->performanceLaboratorioPardini->get($dataInicio, $dataFim, $idExecutivo, $user);

        $datesPeriodoA = $this->getDatesPeriodoA($dataInicio, $dataFim);
        $periodoA = $this->performanceLaboratorioPardini->get($datesPeriodoA['dataInicio'], $datesPeriodoA['dataFim'], $idExecutivo, $user);

        return $this->returnData($periodoB, $periodoA);
    }

    private function returnData($periodoB, $periodoA)
    {
        $performanceLaboratorioPeriodos = new PerformanceLaboratorioPeriodos();
        $performanceLaboratorioPeriodos = $performanceLaboratorioPeriodos->mergePeriodoAOnPeriodoB($periodoB, $periodoA);

        $performanceLaboratorios = new PerformanceTransformer();
        $performanceLaboratorios = $performanceLaboratorios->transform($performanceLaboratorioPeriodos);

        return collect([
            'data' => $performanceLaboratorios,
            'dataInicioPeriodoB' => $dataInicio->format('d/m/Y'),
            'dataFimPeriodoB' => $dataFim->format('d/m/Y'),
            'dataInicioPeriodoA' => $datesPeriodoA['dataInicio']->format('d/m/Y'),
            'dataFimPeriodoA' => $datesPeriodoA['dataFim']->format('d/m/Y'),
            'totalPeriodoB' => $performanceLaboratorioPeriodos->sum('qtd'),
            'totalPeriodoA' => $performanceLaboratorioPeriodos->sum('qtdPeriodoA'),
        ]);
    }
}
