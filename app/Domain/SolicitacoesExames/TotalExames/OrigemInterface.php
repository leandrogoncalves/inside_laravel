<?php

namespace Inside\Domain\SolicitacoesExames\TotalExames;

use Carbon\Carbon;
use Inside\Repositories\Contracts\FormularioRepository;

interface OrigemInterface
{
    public function getTotalExamesSolicitadosPardini(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo);
    public function getTotalExamesSolicitadosPsy(Carbon $dataInicio, Carbon $dataFim, array $idExecutivo);
}
