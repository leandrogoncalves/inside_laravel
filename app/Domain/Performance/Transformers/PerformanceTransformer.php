<?php

namespace Inside\Domain\Performance\Transformers;

use Illuminate\Database\Eloquent\Collection as DatabaseCollection;
use Carbon\Carbon;

class PerformanceTransformer
{
    private $performanceDataResults;

    public function __construct()
    {
        $this->performanceDataResults = collect([]);
    }

    public function transform(DatabaseCollection $data)
    {
        $data->each(function ($item) {
            $this->pushValue($item);
        });

        return $this->performanceDataResults;
    }

    private function pushValue($data)
    {
        $this->performanceDataResults->push(collect([
            'nome_laboratorio' => isset($data->nome_laboratorio)? $data->nome_laboratorio: null,
            'cidade' => isset($data->cidade)? $data->cidade: null,
            'estado'=> isset($data->estado)? $data->estado: null,
            'ativo'=> isset($data->ativo)? $data->ativo: null,
            'id_executivo_psy'=> isset($data->id_executivo_psy)? $data->id_executivo_psy: null,
            'id_executivo_pardini'=> isset($data->id_executivo_pardini)? $data->id_executivo_pardini: null,
            'nome_executivo_psy'=> isset($data->nome_executivo_psy)? $data->nome_executivo_psy: null,
            'nome_executivo_pardini'=> isset($data->nome_executivo_pardini)? $data->nome_executivo_pardini: null,
            'valor_exame_clt'=> isset($data->valor_exame_clt)? $data->valor_exame_clt: null,
            'valor_exame_cnh'=> isset($data->valor_exame_cnh)? $data->valor_exame_cnh: null,
            'data_ultimo_comentario'=> !empty($data->data_ultimo_comentario) && $data->data_ultimo_comentario != '0000-00-00' ? Carbon::createFromFormat('Y-m-d',$data->data_ultimo_comentario)->format('d/m/Y'): ' --- ',
            'nome_ultimo_comentario'=> !empty($data->nome_ultimo_comentario)? $data->nome_ultimo_comentario: '---',
            'id_laboratorio_psy'=> isset($data->id_laboratorio_psy)? $data->id_laboratorio_psy: null,
            'id_laboratorio_pardini'=> isset($data->id_laboratorio_pardini)? $data->id_laboratorio_pardini: null,
            'rede'=> isset($data->rede)? $data->rede: null,
            'quantidadePeriodoB'=> isset($data->qtd)? $data->qtd: null,
            'quantidadePeriodoA'=> isset($data->qtdPeriodoA)? $data->qtdPeriodoA: null,
            'variacao'=> isset($data->variacao)? $data->variacao: null,
            'variacaoPorcentual'=> isset($data->variacaoPorcentual)? $data->variacaoPorcentual . '%': '0%',
            'bg_color'=> $this->getBgColor($data->rede, $data->logistica_pardini)
        ]));
    }


    private function getBgColor($rede, $logistica)
    {
        //Rede pardini
        if ($rede == 1) {
            return 'list-group-item-danger';
        }

        //Rede Psy
        if ($rede == 2) {
            return 'list-group-item-info';
        }

        // Logisica Pardini
        if ($logistica == 'S') {
            return 'list-group-item-warning';
        }

        return "";
    }
}
