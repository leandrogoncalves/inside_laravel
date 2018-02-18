<?php

namespace Inside\Domain\TotalExamesAgrupadosMes\Transformers;

use Illuminate\Database\Eloquent\Collection as DatabaseCollection;
use Carbon\Carbon;

class TotalExamesAgrupadosMesTransformer
{
    public function transform(Carbon $dataInicio, Carbon $dataFim, int $differenceDays, DatabaseCollection $data)
    {
        $newData = collect([]);

        for ($i=0; $i < $differenceDays; $i++) {
            $hasDate = $dataInicio->copy()->addDays($i);
            $actualData = $data->where('data_inclusao', $hasDate);

            if ($actualData->count() < 1) {
                $newData->push([
                    "data_inclusao" => $hasDate->format("d/m/Y"),
                    "quantidade" => 0
                ]);
            } else {
                $quantidade = $data->filter(function ($item) use ($actualData) {
                    $diasAnteriores = $actualData->first()->data_inclusao->copy()->addDays(-30);

                    if ($item->data_inclusao <= $actualData->first()->data_inclusao->copy() &&
                    $item->data_inclusao >= $diasAnteriores) {
                        return $item;
                    }
                });

                $newData->push([
                    "data_inclusao" => $actualData->first()->data_inclusao->format("d/m/Y"),
                    "quantidade" => $quantidade->sum('quantidade'),
                ]);
            }
        }
        return $newData->sortBy(function ($obj) {
            return Carbon::createFromFormat("d/m/Y", $obj["data_inclusao"])->timestamp;
        })->values();
    }
}
