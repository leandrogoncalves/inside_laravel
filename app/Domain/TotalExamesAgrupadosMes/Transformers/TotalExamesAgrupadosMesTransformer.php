<?php

namespace Inside\Domain\TotalExamesAgrupadosMes\Transformers;

use Illuminate\Database\Eloquent\Collection as DatabaseCollection;
use Carbon\Carbon;

class TotalExamesAgrupadosMesTransformer
{
    public function transform(Carbon $dataInicio, Carbon $dataFim, int $differenceDays, DatabaseCollection $data)
    {
        for ($i=0; $i < $differenceDays; $i++) {
            $hasDate = $dataInicio->copy()->addDays($i);
            if ($data->where('data_inclusao', $hasDate)->count() < 1) {
                $data->push([
                    "data_inclusao" => $hasDate->format("Y-m-d"),
                    "quantidade" => 0
                ]);
            }
        }
        return $data->sortBy('data_inclusao');
    }
}
