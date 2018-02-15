<?php

namespace Inside\Services\SolicitacoesExames;

use Inside\Services\SolicitacoesExames\Psy\Executivos;
use Inside\Services\SolicitacoesExames\Pardini\Executivos as ExecutivosPardini;

use Inside\Repositories\Contracts\LaboratorioRepository;
use Inside\Repositories\Contracts\FormularioRepository;

use Inside\Models\Formulario;
use \DB;

class TotalExames
{
    private $formularioRepository;
    private $executivoRepository;
    private $executivoPardiniRepository;

    public function __construct(Executivos $executivoRepository, ExecutivosPardini $executivoPardiniRepository, FormularioRepository $formularioRepository)
    {
        $this->formularioRepository = $formularioRepository;
        $this->executivoRepository = $executivoRepository;
        $this->executivoPardiniRepository = $executivoPardiniRepository;
    }

    public function getTotalExamesSolicitados()
    {
        $idExecutivoPsy = $this->executivoRepository->getIdExecutivoByCodigoExecutivo();
        $dataInicio = '2018-02-01 00:00:00';
        $dataFim = '2018-02-12 23:59:59';

        return $this->formularioRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where("OprFrmDtHrIncl", ">=", $dataInicio)
            ->where("OprFrmDtHrIncl", "<=", $dataFim)
            ->where("OprFrmStatus", "<>", "C")
            ->where("OprFrmOrigem", "<>", "CAG")
            ->where("OprFrmOrigem", "<>", "LAB");
        })
        ->with(["laboratorio"])
        ->whereHas("laboratorio", function ($query) use ($idExecutivoPsy) {
            $query->whereIn('id_executivo_psy', $idExecutivoPsy);
        })
        ->groupBy("OprFrmOrigem")
        ->orderBy("OprFrmOrigem")
        ->all(["OprFrmOrigem", DB::raw("count(1) as total")]);
    }
}
