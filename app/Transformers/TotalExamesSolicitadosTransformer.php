<?php

namespace Inside\Transformers;

use Illuminate\Support\Collection;

class TotalExamesSolicitadosTransformer
{
    protected $totalExamesSolicitadosPorPeriodo;
    protected $sumTotalExamesPorPeriodo;
    protected $sumTotalExamesPorPeriodoPorcentagem;

    public function __construct()
    {
        $this->totalExamesSolicitadosPorPeriodo = collect([]);
        $this->sumTotalExamesPorPeriodo = 0;
        $this->sumTotalExamesPorPeriodoPorcentagem = 0;
    }

    public function transform(Collection $data)
    {
        if ($this->getTotalExamesSolicitados($data)) {
            //PERCORRE TODOS OS PERIODOS
            $data->each(function ($periodo, $keyPeriodo) {
                //PERCORRE TODAS AS ORIGENS (MACRO) DENTRO DE CADA PERIODO
                $periodo->each(function ($origens) use ($keyPeriodo) {
                    //PERCORRE CADA ORIGEM (MICRO) DENTRO DA ORIGEM MACRO
                    if ($origens instanceof Collection) {
                        $origens->each(function ($origem) use ($keyPeriodo) {
                            //PEGA O VALOR EM PERCENTUAL DO TOTAL DESSA ORIGEM
                            $percentage = $this->getPercentageFromExames($keyPeriodo, $origem["origem"]["total"]);
                            $this->sumTotalExamesPorPeriodo += ((int) $origem["origem"]["total"]);
                            $this->sumTotalExamesPorPeriodoPorcentagem += $this->getPercentageFromExames($keyPeriodo, $origem["origem"]["total"], false);
                            //COLOCA (PUT) ESSA VALOR PERCENTUAL DENTRO DA ORIGEM (MICRO)
                            $origem["origem"]->put("porcentualTotal", $percentage);
                        });
                    }
                });
                $periodo->put("totalExamesPorPeriodo", $this->sumTotalExamesPorPeriodo);
                $this->sumTotalExamesPorPeriodoPorcentagem = round($this->sumTotalExamesPorPeriodoPorcentagem, 0);
                $periodo->put("totalExamesPorPeriodoPorcentagem", ($this->sumTotalExamesPorPeriodoPorcentagem > 98 || $this->sumTotalExamesPorPeriodoPorcentagem < 101? 100: $this->sumTotalExamesPorPeriodoPorcentagem));
                $this->sumTotalExamesPorPeriodo = 0;
                $this->sumTotalExamesPorPeriodoPorcentagem = 0;
            });
            return $data;
        }
    }

    private function getTotalExamesSolicitados(Collection $data)
    {
        $data->each(function ($periodo, $key) {
            $totalPorOrigem = $periodo->map(function ($origem, $key) {
                if ($origem instanceof Collection) {
                    $origensTotais = $origem->map(function ($item) {
                        return $item["origem"]["total"];
                    });
                    return $origensTotais->sum();
                }
            });

            $this->totalExamesSolicitadosPorPeriodo->put($key, $totalPorOrigem->sum());
        });

        return true;
    }


    private function getPercentageFromExames($periodo, $exames, $concatPercentageSymbol = true)
    {
        if ($this->totalExamesSolicitadosPorPeriodo[$periodo]) {
            return $concatPercentageSymbol? (round(($exames * 100 /$this->totalExamesSolicitadosPorPeriodo[$periodo]), 2)) . "%" : (round(($exames * 100 /$this->totalExamesSolicitadosPorPeriodo[$periodo]), 2));
        }
        return 0;
    }
}
