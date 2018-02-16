<?php

namespace Inside\Domain\SolicitacoesExames\TotalExames\Transformers;

use Inside\Models\Formulario;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;

abstract class OrigemTransformer
{
    protected $dataTransformer;

    public function __construct()
    {
        $this->dataTransformer = collect([]);
    }

    public function transform(Collection $data, Carbon $periodStart)
    {
        $data->each(function ($item, $key) use ($periodStart) {
            $this->transformerDataPush($periodStart->format("d-m-Y"), $item->OprFrmOrigem, $item->total);
        });

        return $this->dataTransformer;
    }

    protected function transformerDataPush($period, $name, $total)
    {
        $this->dataTransformer->put($name, collect([
            'period' => $period,
            'origem' => collect([
                'nome' => $name,
                'alias' => $this->getAlias($name),
                'total' => $total
            ]),
        ]));
    }

    protected function getAlias($name)
    {
        return isset(Formulario::ORIGEM_ALIAS[$name])? Formulario::ORIGEM_ALIAS[$name] : $name;
    }
}
