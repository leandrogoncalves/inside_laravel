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
            // $hasDate É A VARIAVEL QUE AUXILIA A GENTE ITERA TODOS OS DIAS;
            $hasDate = $dataInicio->copy()->addDays($i);
            $actualData = $data->where('data_inclusao', $hasDate); //PROCURO SE EXISTE A DATA ATUAL DA ITERAÇÃO NA COLLECTION QUE VEIO DO BANCO

            //PEGA A QUANTIDADE DO DIA + 30 DIAS ATRÁS.
            //EU PRECISO A CADA ITERAÇÃO DE DIA, PEGA ESSA QUANTIDADE.
            $quantidade = $data->filter(function ($item) use ($hasDate) {
                $dataAtualIteracao = $hasDate->copy();
                $diasAnteriores = $hasDate->copy()->addDays(-30);

                if ($item->data_inclusao <= $dataAtualIteracao && $item->data_inclusao >= $diasAnteriores) {
                    return $item;
                }
            });

            //AGORA EU VERIFICO SE O DIA QUE ESTÁ NA ITERAÇÃO NO MOMENTO EXISTE NA COLLECTION
            //CASO NÃO EXISTA, EU VOU "CRIAR" ELE.
            if ($actualData->count() < 1) {
                $newData->push([
                    "data_inclusao" => $hasDate->format("d/m/Y"),
                    "quantidade" => $quantidade->sum('quantidade'),
                ]);
            } else {
                $newData->push([
                    "data_inclusao" => $actualData->first()->data_inclusao->format("d/m/Y"),
                    "quantidade" => $quantidade->sum('quantidade'),
                ]);
            }
        }

        //AGORA, ANTES DE RETORNAR EU FAÇO UMA ORDENAÇÃO.
        return $newData->sortBy(function ($obj) {
            return Carbon::createFromFormat("d/m/Y", $obj["data_inclusao"])->timestamp;
        })->values();
    }
}
