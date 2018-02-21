<?php

namespace Inside\Domain\Performance\PerformanceLaboratorioNewDates;

use Inside\Domain\Performance\PerformanceLaboratorioNewDates\Psy\PerformanceLaboratorio as PerformanceLaboratorioPsy;
use Inside\Domain\Performance\PerformanceLaboratorioNewDates\Pardini\PerformanceLaboratorio as PerformanceLaboratorioPardini;
use Inside\Domain\Performance\PerformanceLaboratorioNewDates\PerformanceLaboratorioPeriodos;
use Inside\Domain\Performance\Transformers\PerformanceTransformer;

use Carbon\Carbon;
use Inside\Domain\Executivos\Executivos;
use Inside\Domain\UsuarioLogado;

class PerformanceLaboratorioNewDates
{
    private $executivos;
    private $performanceLaboratorioPsy;
    private $performanceLaboratorioPardini;

    public function __construct(Executivos $executivos, PerformanceLaboratorioPsy $performanceLaboratorioPsy, PerformanceLaboratorioPardini $performanceLaboratorioPardini)
    {
        $this->executivos = $executivos;
        $this->performanceLaboratorioPsy = $performanceLaboratorioPsy;
        $this->performanceLaboratorioPardini = $performanceLaboratorioPardini;
    }

    public function get(Carbon $dataInicio, Carbon $dataFim, UsuarioLogado $user)
    {
        if ($user->isUserPsy()) {
            $idExecutivo = $this->executivos->getIdExecutivo($user);
            $user->setIdGerente($this->executivos->getIdGerente($user)['codigo_gerente']);
            return $this->getPerformanceLaboratorioPsy($dataInicio, $dataFim, $idExecutivo, $user);
        }

        if ($user->isUserPardini()) {
            $idExecutivo = $this->executivos->getIdExecutivo($user);
            return $this->getPerformanceLaboratorioPardini($dataInicio, $dataFim, $idExecutivo);
        }

        throw new \Exception("Perfil de acesso inválido", 400);
    }

    public function getPerformanceLaboratorioPsy(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo, UsuarioLogado $user)
    {
        $periodoB = $this->performanceLaboratorioPsy->get($dataInicio, $dataFim, $idExecutivo, $user);
        $datesPeriodoA = $this->getDatesPeriodoA($dataInicio, $dataFim);
        $periodoA = $this->performanceLaboratorioPsy->get($datesPeriodoA['dataInicio'], $datesPeriodoA['dataFim'], $idExecutivo, $user);

        return $this->returnData($periodoB, $periodoA, $dataInicio, $dataFim);
    }

    public function getPerformanceLaboratorioPardini(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        $periodoB = $this->performanceLaboratorioPardini->get($dataInicio, $dataFim, $idExecutivo);

        $datesPeriodoA = $this->getDatesPeriodoA($dataInicio, $dataFim);
        $periodoA = $this->performanceLaboratorioPardini->get($datesPeriodoA['dataInicio'], $datesPeriodoA['dataFim'], $idExecutivo);

        return $this->returnData($periodoB, $periodoA, $dataInicio, $dataFim);
    }

    private function returnData($periodoB, $periodoA, $dataInicio, $dataFim)
    {
        $datesPeriodoA = $this->getDatesPeriodoA($dataInicio, $dataFim);
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

    private function getDatesPeriodoA(Carbon $dataInicio, Carbon $dataFim)
    {
        $differenceInDaysNegative = $dataFim->copy()->diffInDays($dataInicio);
        $differenceInDaysNegative = $differenceInDaysNegative * (-1);

        $dataFimPeriodoA = $dataInicio->copy()->addDays(-1);
        $dataInicioPeriodoA = $dataFimPeriodoA->copy()->addDays($differenceInDaysNegative);


        return ['dataInicio' => $dataInicioPeriodoA, 'dataFim' => $dataFimPeriodoA];
    }
}
