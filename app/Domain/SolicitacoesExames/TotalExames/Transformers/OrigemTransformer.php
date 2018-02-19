<?php

namespace Inside\Domain\SolicitacoesExames\TotalExames\Transformers;

use Inside\Models\Formulario;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;

abstract class OrigemTransformer
{
    protected $fieldsSelected;
    protected $dataTransformer;

    public function __construct(array $fieldsSelected)
    {
        $this->dataTransformer = collect([]);
        $this->fieldsSelected = collect(array_flip($fieldsSelected));
    }

    public function transform(Collection $data, Carbon $periodStart)
    {
        $data->each(function ($item, $key) use ($periodStart) {
            $this->transformerDataPush($periodStart->format("d/m/Y"), $item->OprFrmOrigem, $item->total);
        });

        $this->fillFieldsMissing($periodStart);

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

    protected function checkIfAllFieldsIsFilled()
    {
        foreach ($this->dataTransformer as $key => $value) {
            $key = $value["origem"]["nome"];
            $this->fieldsSelected[$key] = true;
        }
    }

    protected function fillFieldsMissing(Carbon $periodStart)
    {
        $this->checkIfAllFieldsIsFilled();

        $this->fieldsSelected->each(function ($item, $key) use ($periodStart) {
            //SE JÁ TEMOS ESSA CHAVE PREENCHIDA, VAMOS DAR UM RETURN FALSE (continue)
            if ($item !== true) {
                $this->transformerDataPush($periodStart->format("d/m/Y"), $key, 0);
            }
        });
    }
}
