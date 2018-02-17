<?php

namespace Inside\Domain\SolicitacoesExames\TotalExames;

use Carbon\Carbon;
use Inside\Repositories\Contracts\FormularioRepository;
use \DB;

class OrigemLaboratorioCltCnh implements OrigemInterface
{
    use HelpMethods;

    const FIELDS_SELECTED = [
        "LABT",
        "LABC",
    ];

    private $formularioRepository;

    public function __construct(FormularioRepository $formularioRepository)
    {
        $this->formularioRepository = $formularioRepository;
    }

    public function getTotalExamesSolicitadosPardini(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        $dataInicio = $this->getDateFormatted($dataInicio);
        $dataFim = $this->getDateFormatted($dataFim);

        return $this->formularioRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where("OprFrmDtHrIncl", ">=", $dataInicio)
            ->where("OprFrmDtHrIncl", "<=", $dataFim)
            ->where("OprFrmStatus", "<>", "C") //PEGA TODOS OS EXAMES QUE NÃO ESTEJAM CANCELADOS
            ->where("OprFrmOrigem", '=', "LAB") //PEGA EXAMES CUJA A ORIGEM FOI SOLICITADO POR UM LABORATORIO
            ->where("OprFrmOrigem", "<>", "CAG") //FORÇAMOS QUE A ORIGEM PRECISA SER DIFERENTE DE CAG
            ->whereIn("OprFrmTipo", ["C", "T"]) ;//PEGA APENAS OS TIPOS CLT E CNH
        })
        ->with(["laboratorio"])
        ->whereHas("laboratorio", function ($query) use ($idExecutivo) {
            $query
            ->whereIn('id_laboratorio', $idExecutivo);
        })
        ->groupBy("origem")
        ->orderBy("origem")
        ->all([DB::raw("CONCAT(azoprfrm.OprFrmOrigem, azoprfrm.OprFrmTipo) as origem"), DB::raw("count(1) as total")]);
    }

    public function getTotalExamesSolicitadosPsy(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo)
    {
        $dataInicio = $this->getDateFormatted($dataInicio);
        $dataFim = $this->getDateFormatted($dataFim);

        return $this->formularioRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where("OprFrmDtHrIncl", ">=", $dataInicio) //FILTRAR PELAS DATA DE INICIO
            ->where("OprFrmDtHrIncl", "<=", $dataFim) //FILTRAR PELAS DATA DE FIM
            ->where("OprFrmStatus", "<>", "C") //PEGA TODOS OS EXAMES QUE NÃO ESTEJAM CANCELADOS
            ->where("OprFrmOrigem", '=', "LAB") //PEGA EXAMES CUJA A ORIGEM FOI SOLICITADO POR UM LABORATORIO
            ->where("OprFrmOrigem", "<>", "CAG") //FORÇAMOS QUE A ORIGEM PRECISA SER DIFERENTE DE CAG
            ->whereIn("OprFrmTipo", ["C", "T"]) ;//PEGA APENAS OS TIPOS CLT E CNH
        })
        ->with(["laboratorio"])
        ->whereHas("laboratorio", function ($query) use ($idExecutivo) {
            $query->whereIn('id_executivo_psy', $idExecutivo);
        })
        ->groupBy("origem")
        ->orderBy("origem")
        ->all([DB::raw("CONCAT(azoprfrm.OprFrmOrigem, azoprfrm.OprFrmTipo) as origem"), DB::raw("count(1) as total")]);
    }
}
