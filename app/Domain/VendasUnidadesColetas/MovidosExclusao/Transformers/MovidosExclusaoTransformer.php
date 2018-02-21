<?php

namespace Inside\Domain\VendasUnidadesColetas\MovidosExclusao\Transformers;


use Illuminate\Database\Eloquent\Collection as DatabaseCollection;


class MovidosExclusaoTransformer
{
    private $performanceDataResults;

    public function __construct()
    {
        $this->performanceDataResults = collect([]);
    }

    public function transform(DatabaseCollection $data)
    {
        $data->each(function ($item) {
            $this->pushValue($item->toArray());
        });

        return collect([
            'data' => $this->performanceDataResults,
        ]);
    }

    private function pushValue($data)
    {

        $this->performanceDataResults->push(collect([
            'nome_laboratorio' => isset($data['nome_laboratorio'])? $data['nome_laboratorio']: null,
            'cidade' => isset($data['cidade'])? $data['cidade']: null,
            'id_laboratorio_psy'=> isset($data['id_laboratorio_psy'])? $data['id_laboratorio_psy']: null,
            'bg_color'=> $this->getBgColor($data['rede'],$data['logistica_pardini'])
        ]));
    }


    public function getBgColor($rede, $logistica)
    {
        if($logistica == 'S'){ // Logisica Pardini
            return 'list-group-item-warning';
        }

        if($rede == 1){ //Rede pardini
            return 'list-group-item-danger';
        }

        if($rede == 2){ //Rede Psy
            return 'list-group-item-info';
        }

    }
}