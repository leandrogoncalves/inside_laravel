<?php

namespace Inside\Domain\VendasUnidadesColetas\ComVenda\Transformers;

use Illuminate\Database\Eloquent\Collection as DatabaseCollection;
use Carbon\Carbon;

class UnidadeColetaComVendaDetailTransformer
{
    private $performanceDataResults;

    public function __construct()
    {
        $this->performanceDataResults = collect([]);
    }

    public function transform(DatabaseCollection $data)
    {
        $data->each(function ($item) {
            $quantidadePeriodoB = isset($item->periodo_b_glaudyson)? $item->periodo_b_glaudyson: $item->periodo_b_teza;
            $quantidadePeriodoA = isset($item->periodo_a_glaudyson)? $item->periodo_a_glaudyson: $item->periodo_a_teza;
            $variacao = isset($item->variacao_glaudyson)? $item->variacao_glaudyson: $item->variacao_teza;
            $variacaoPorcentual = isset($item->variacao_porcentual_glaudyson)? $item->variacao_porcentual_glaudyson: $item->variacao_porcentual_teza;

            $this->pushValue($item->toArray(), $quantidadePeriodoB, $quantidadePeriodoA, $variacao, $variacaoPorcentual);
        });

        return collect([
            'data' => $this->performanceDataResults,
            'dataInicioPeriodoB' => Carbon::now()->copy()->addDays(-30)->hour(23)->minute(59)->second(59)->format('d/m/Y'),
            'dataFimPeriodoB' => Carbon::now()->copy()->hour(0)->minute(0)->second(0)->format('d/m/Y'),
            'dataInicioPeriodoA' => Carbon::now()->copy()->addDays(-31)->hour(0)->minute(0)->second(0)->format('d/m/Y'),
            'dataFimPeriodoA' => Carbon::now()->copy()->addDays(-61)->hour(23)->minute(59)->second(59)->format('d/m/Y'),

            'totalPeriodoB' => $this->performanceDataResults->sum('quantidadePeriodoB'),
            'totalPeriodoA' => $this->performanceDataResults->sum('quantidadePeriodoA'),
        ]);
    }

    private function pushValue($data, $quantidadePeriodoB, $quantidadePeriodoA, $variacao, $variacaoPorcentual)
    {

        $this->performanceDataResults->push(collect([
            'nome_laboratorio' => isset($data['nome_laboratorio'])? $data['nome_laboratorio']: null,
            'cidade' => isset($data['cidade'])? $data['cidade']: null,
            'estado'=> isset($data['estado'])? $data['estado']: null,
            'ativo'=> isset($data['ativo'])? $data['ativo']: null,
            'id_executivo_psy'=> isset($data['id_executivo_psy'])? $data['id_executivo_psy']: null,
            'id_executivo_pardini'=> isset($data['id_executivo_pardini'])? $data['id_executivo_pardini']: null,
            'nome_executivo_psy'=> isset($data['nome_executivo_psy'])? $data['nome_executivo_psy']: null,
            'nome_executivo_pardini'=> isset($data['nome_executivo_pardini'])? $data['nome_executivo_pardini']: null,
            'valor_exame_clt'=> isset($data['valor_exame_clt'])? $data['valor_exame_clt']: null,
            'valor_exame_cnh'=> isset($data['valor_exame_cnh'])? $data['valor_exame_cnh']: null,
            'data_ultimo_comentario'=> !empty($data['data_ultimo_comentario']) && $data['data_ultimo_comentario'] != '0000-00-00' ? Carbon::createFromFormat('Y-m-d',$data['data_ultimo_comentario'])->format('d/m/Y'): ' --- ',
            'nome_ultimo_comentario'=> !empty($data['nome_ultimo_comentario'])? $data['nome_ultimo_comentario']: '---',
            'id_laboratorio_psy'=> isset($data['id_laboratorio_psy'])? $data['id_laboratorio_psy']: null,
            'id_laboratorio_pardini'=> isset($data['id_laboratorio_pardini'])? $data['id_laboratorio_pardini']: null,
            'rede'=> isset($data['rede'])? $data['rede']: null,
            'quantidadePeriodoB'=> isset($quantidadePeriodoB)? $quantidadePeriodoB: null,
            'quantidadePeriodoA'=> isset($quantidadePeriodoA)? $quantidadePeriodoA: null,
            'variacao'=> isset($variacao)? $variacao: null,
            'variacaoPorcentual'=> isset($variacaoPorcentual) && $variacaoPorcentual != 0? $variacaoPorcentual . '%': '0%',
            'bg_color'=> $this->getBgColor($data['rede'],$data['logistica_pardini'])
        ]));
    }


    public function getBgColor($rede, $logistica)
    {

        if($rede == 1){ //Rede pardini
            return 'list-group-item-danger';
        }

        if($rede == 2){ //Rede Psy
            return 'list-group-item-info';
        }

        if($logistica == 'S'){ // Logisica Pardini
            return 'list-group-item-warning';
        }

    }
}
