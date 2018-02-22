<?php

namespace Inside\Domain\Performance\PerformanceLaboratorioNewDates;

use Illuminate\Database\Eloquent\Collection as DatabaseCollection;

class PerformanceLaboratorioPeriodos
{
    public function mergePeriodoAOnPeriodoB(DatabaseCollection $periodoB, DatabaseCollection $periodoA)
    {
        $periodoB->each(function ($itemPeriodoB) use ($periodoA) {
            $itemPeriodoA = $periodoA->firstWhere('id_laboratorio', $itemPeriodoB->id_laboratorio);

            $totalB = isset($itemPeriodoB->qtd)? $itemPeriodoB->qtd:0;
            $totalA = isset($itemPeriodoA->qtd)? $itemPeriodoA->qtd:0;

            if (isset($itemPeriodoA)) {
                $itemPeriodoB->qtdPeriodoA = $totalA;
                $itemPeriodoB->variacao = $this->getVariacao($totalB, $totalA);
                $itemPeriodoB->variacaoPorcentual = $this->getVariacaoPorcentual($totalB, $totalA);
            } else {
                $itemPeriodoB->qtdPeriodoA = 0;
                $itemPeriodoB->variacao = $this->getVariacao($totalB, $totalA);
                $itemPeriodoB->variacaoPorcentual = 0;
            }

            $periodoA->pop($itemPeriodoA);
        });

        return $periodoB;
    }

    private function getVariacao($totalB, $totalA)
    {
        $totalB = isset($totalB)? intval($totalB): 0;
        $totalA = isset($totalA)? intval($totalA): 0;

        return $totalB - $totalA;
    }

    private function getVariacaoPorcentual($totalB, $totalA)
    {
        $totalB = isset($totalB)? intval($totalB): 0;
        $totalA = isset($totalA)? intval($totalA): 0;

        return $totalA > 0? round((($totalB - $totalA)/$totalA)*100) : 0;
    }
}
