<?php

namespace Inside\Domain\VendasUnidadesColetas\SemVenda\Transformers;

use Illuminate\Database\Eloquent\Collection as DatabaseCollection;
use Carbon\Carbon;


class UnidadeColetaSemVendaDetailTransformer
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
            'total_vendas_trinta_dias' => $data->sum('qtd_vendas_trinta_dias')
        ]);
    }

    private function pushValue($data)
    {

        $this->performanceDataResults->push(collect([
            'nome_laboratorio' => isset($data['nome_laboratorio'])? $data['nome_laboratorio']: null,
            'cidade' => isset($data['cidade'])? $data['cidade']: null,
            'estado' => isset($data['estado'])? $data['estado']: null,
            'id_executivo_psy'=> isset($data['id_executivo_psy'])? $data['id_executivo_psy']: null,
            'id_executivo_pardini'=> isset($data['id_executivo_pardini'])? $data['id_executivo_pardini']: null,
            'nome_executivo_psy'=> isset($data['nome_executivo_psy'])? $data['nome_executivo_psy']: null,
            'nome_executivo_pardini'=> isset($data['nome_executivo_pardini'])? $data['nome_executivo_pardini']: null,
            'data_ultimo_comentario'=> !empty($data['data_ultimo_comentario']) && $data['data_ultimo_comentario'] != '0000-00-00'
                ? Carbon::createFromFormat('Y-m-d',$data['data_ultimo_comentario'])->format('d/m/Y')
                : ' --- ',
            'nome_ultimo_comentario'=> !empty($data['nome_ultimo_comentario'])? $data['nome_ultimo_comentario']: '---',
            'id_laboratorio_psy'=> isset($data['id_laboratorio_psy'])? $data['id_laboratorio_psy']: null,
            'id_laboratorio_pardini'=> isset($data['id_laboratorio_pardini'])? $data['id_laboratorio_pardini']: null,
            'rede'=> isset($data['rede'])? $data['rede']: null,
            'data_ultima_venda'=> isset($data['data_ultima_venda']) && $data['data_ultima_venda'] != '0000-00-00'
                 ? Carbon::createFromFormat('Y-m-d',$data['data_ultima_venda'])->format('d/m/Y')
                 : ' --- ',
            'dias_sem_vender' => !empty($data['dias_sem_vender'])? (int)$data['dias_sem_vender']: 0,
            'qtd_vendas_trinta_dias'=> !empty($data['qtd_vendas_trinta_dias'])? $data['qtd_vendas_trinta_dias']: 0,
            'total_dias_sem_vender'=> !empty($data['total_dias_sem_vender'])? $data['total_dias_sem_vender']: 0,
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