<?php

namespace Inside\Transformers;

use Illuminate\Support\Collection;

class TotalExamesSolicitadosTransformer
{
    protected $totalExamesSolicitadosPorPeriodo;

    public function __construct()
    {
        $this->totalExamesSolicitadosPorPeriodo = collect([]);
    }

    public function transform(Collection $data)
    {
        if ($this->getTotalExamesSolicitados($data)) {
            $data->each(function ($periodo, $keyPeriodo) {
                $periodo->each(function ($origens) use ($keyPeriodo) {
                    $origens->each(function ($origem) use ($keyPeriodo) {
                        $percentage = $this->getPercentageFromExames($keyPeriodo, $origem["origem"]["total"]);
                        $origem["origem"]->put("porcentualTotal", $percentage);
                    });
                });
            });

            dd($data, "xaninha");
        }
    }

    private function getTotalExamesSolicitados(Collection $data)
    {
        $data->each(function ($periodo, $key) {
            $totalPorOrigem = $periodo->map(function ($origem, $key) {
                $origensTotais = $origem->map(function ($item) {
                    return $item["origem"]["total"];
                });
                return $origensTotais->sum();
            });

            $this->totalExamesSolicitadosPorPeriodo->put($key, $totalPorOrigem->sum());
        });

        return true;
    }


    private function getPercentageFromExames($periodo, $exames)
    {
        return (round(($exames * 100 /$this->totalExamesSolicitadosPorPeriodo[$periodo]), 2)) . "%";
    }
}
