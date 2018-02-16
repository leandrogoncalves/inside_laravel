<?php

namespace Inside\Domain\SolicitacoesExames\TotalExames\Transformers;

use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;

class OrigemLaboratorioCltCnhTransformer extends OrigemTransformer
{
    public function transform(Collection $data, Carbon $periodStart)
    {
        $data->each(function ($item, $key) use ($periodStart) {
            $this->transformerDataPush($periodStart->format("d-m-Y"), $item->origem, $item->total);
        });

        return $this->dataTransformer;
    }
}
