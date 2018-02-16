<?php

namespace Inside\Domain\SolicitacoesExames\TotalExames;

use Inside\Domain\SolicitacoesExames\UsuarioLogado;
use Inside\Domain\SolicitacoesExames\Executivos\Executivos;

use Inside\Domain\SolicitacoesExames\TotalExames\OrigemBasica;
use Inside\Domain\SolicitacoesExames\TotalExames\OrigemLaboratorio;
use Inside\Domain\SolicitacoesExames\TotalExames\OrigemLaboratorioCltCnh;

use Carbon\Carbon;

class TotalExames
{
    private $executivos;
    private $origemBasica;


    public function __construct(Executivos $executivos, OrigemBasica $origemBasica, OrigemLaboratorio $origemLaboratorio, OrigemLaboratorioCltCnh $origemLaboratorioCltCnh)
    {
        $this->executivos = $executivos;
        $this->origemBasica = $origemBasica;
        $this->origemLaboratorio = $origemLaboratorio;
        $this->origemLaboratorioCltCnh = $origemLaboratorioCltCnh;
    }

    public function getTotalExamesSolicitados(Carbon $dataInicio, Carbon $dataFim, UsuarioLogado $user)
    {
        $idExecutivo = $this->executivos->getIdExecutivo($user);

        if ($user->isUserPsy()) {
            return collect([
                $this->origemBasica->getTotalExamesSolicitadosPsy($dataInicio, $dataFim, $idExecutivo),
                $this->origemLaboratorio->getTotalExamesSolicitadosPsy($dataInicio, $dataFim, $idExecutivo),
                $this->origemLaboratorioCltCnh->getTotalExamesSolicitadosPsy($dataInicio, $dataFim, $idExecutivo),
            ]);
        }

        if ($user->isUserPardini()) {
            return collect([
                $this->origemBasica->getTotalExamesSolicitadosPardini($dataInicio, $dataFim, $idExecutivo),
                $this->origemLaboratorio->getTotalExamesSolicitadosPardini($dataInicio, $dataFim, $idExecutivo),
                $this->origemLaboratorioCltCnh->getTotalExamesSolicitadosPardini($dataInicio, $dataFim, $idExecutivo),
            ]);
        }

        throw new Exception("Usuário de perfil inválido, não é nem Pardini e nem Psy.", 400);
    }
}
