<?php

namespace Inside\Domain\PrecoMedio\Transformers;

use Illuminate\Database\Eloquent\Collection as DatabaseCollection;

class PrecoMedioTransformer
{
    public function transform(DatabaseCollection $data)
    {
        $data = $data->first();
        return collect([
            "total" => isset($data->total)? $this->formatNumberToBrazilian($data->total): 0,
            "quantidade" => isset($data->quantidade)? $data->quantidade: 0,
            "precoMedio" => isset($data->preco_medio)? $this->formatNumberToBrazilian($data->preco_medio, true): $this->formatNumberToBrazilian(0, true),
        ]);
    }

    private function formatNumberToBrazilian($value, $maskMoney = false)
    {
        $value = number_format($value, 2, ',', '.');
        return $maskMoney? $this->maskMoney($value): $value;
    }

    private function maskMoney($value)
    {
        return 'R$ ' . $value;
    }
}
