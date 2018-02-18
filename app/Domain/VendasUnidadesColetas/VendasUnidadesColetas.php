<?php

namespace Inside\Domain\VendasUnidadesColetas;

use Inside\Domain\UsuarioLogado;
use Inside\Domain\Executivos\Executivos;
use Carbon\Carbon;
use \DB;

class VendasUnidadesColetas
{
    private $user;
    private $executivos;
    private $vendaOrigemRepository;

    public function __construct(Executivos $executivos, VendaOrigemRepository $vendaOrigemRepository)
    {
        $this->executivos = $executivos;
        $this->vendaOrigemRepository = $vendaOrigemRepository;
    }

    public function get(UsuarioLogado $user)
    {
        $this->setUser($user);
        $idExecutivo = $this->executivos->getIdExecutivo($user);
    }

    private function getTotalExamesAgrupadosPardini($dataInicio, $dataFim, array $idExecutivo)
    {
        return $this->vendaOrigemRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where("data_inclusao", ">=", $dataInicio)
            ->where("data_inclusao", "<=", $dataFim);
        })
        ->with(["laboratorio"])
        ->whereHas("laboratorio", function ($query) use ($idExecutivo) {
            $query->whereIn('id_laboratorio', $idExecutivo);
        })
        ->groupBy("data_inclusao")
        ->orderBy("data_inclusao")
        ->all(["data_inclusao", DB::raw("IFNULL(SUM(quantidade), 0) AS quantidade")]);
    }

    private function getTotalExamesAgrupadosPsyNotAdmin($dataInicio, $dataFim, array $idExecutivo)
    {
        return $this->vendaOrigemRepository
        ->scopeQuery(function ($query) use ($dataInicio, $dataFim) {
            return $query
            ->where("data_inclusao", ">=", $dataInicio)
            ->where("data_inclusao", "<=", $dataFim);
        })
        ->with(["laboratorio"])
        ->whereHas("laboratorio", function ($query) use ($idExecutivo) {
            $query->whereIn('id_executivo_psy', $idExecutivo);
        })
        ->groupBy("data_inclusao")
        ->orderBy("data_inclusao")
        ->all(["data_inclusao", DB::raw("IFNULL(SUM(quantidade), 0) AS quantidade")]);
    }
}
