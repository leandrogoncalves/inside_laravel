<?php

namespace Inside\Domain\VendasUnidadesColetas\NuncaVenderam\Transformers;

use Illuminate\Database\Eloquent\Collection as DatabaseCollection;
use Carbon\Carbon;


class UnidadeColetaSemVendaDetailsTransformer
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
            'data_ultimo_comentario'=> !empty($data['data_ultimo_comentario']) && $data['data_ultimo_comentario'] != '0000-00-00' ? Carbon::createFromFormat('Y-m-d',$data['data_ultimo_comentario'])->format('d/m/Y'): ' --- ',
            'nome_ultimo_comentario'=> !empty($data['nome_ultimo_comentario'])? $data['nome_ultimo_comentario']: '---',
            'id_laboratorio_psy'=> isset($data['id_laboratorio_psy'])? $data['id_laboratorio_psy']: null,
            'id_laboratorio_pardini'=> isset($data['id_laboratorio_pardini'])? $data['id_laboratorio_pardini']: null,
            'rede'=> isset($data['rede'])? $data['rede']: null,
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