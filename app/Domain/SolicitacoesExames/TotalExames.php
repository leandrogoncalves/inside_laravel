<?php

namespace Inside\Domain\SolicitacoesExames;

use Inside\Domain\UsuarioLogado;
use Inside\Domain\Executivos\Executivos;

use Inside\Domain\SolicitacoesExames\TotalExames\OrigemBasica;
use Inside\Domain\SolicitacoesExames\TotalExames\OrigemLaboratorio;
use Inside\Domain\SolicitacoesExames\TotalExames\OrigemLaboratorioCltCnh;
use Inside\Domain\SolicitacoesExames\TotalExames\OrigemCaged;

use Inside\Domain\SolicitacoesExames\TotalExames\Transformers\OrigemBasicaTransformer;
use Inside\Domain\SolicitacoesExames\TotalExames\Transformers\OrigemLaboratorioTransformer;
use Inside\Domain\SolicitacoesExames\TotalExames\Transformers\OrigemLaboratorioCltCnhTransformer;
use Inside\Domain\SolicitacoesExames\TotalExames\Transformers\OrigemCagedTransformer;

use Carbon\Carbon;

class TotalExames
{
    private $executivos;
    private $origemBasica;


    public function __construct(Executivos $executivos, OrigemBasica $origemBasica, OrigemLaboratorio $origemLaboratorio, OrigemLaboratorioCltCnh $origemLaboratorioCltCnh, OrigemCaged $origemCaged)
    {
        $this->executivos = $executivos;
        $this->origemBasica = $origemBasica;
        $this->origemLaboratorio = $origemLaboratorio;
        $this->origemLaboratorioCltCnh = $origemLaboratorioCltCnh;
        $this->origemCaged = $origemCaged;
    }

    public function getTotalExamesSolicitados(Carbon $dataInicio, Carbon $dataFim, UsuarioLogado $user)
    {
        $idExecutivo = $this->executivos->getIdExecutivo($user);

        if ($user->isUserPsy()) {
            $origemBasica = $this->origemBasica->getTotalExamesSolicitadosPsy($dataInicio, $dataFim, $idExecutivo);
            $origemBasicaTransformer = new OrigemBasicaTransformer(OrigemBasica::FIELDS_SELECTED);
            $origemBasicaTransformer = $origemBasicaTransformer->transform($origemBasica, $dataInicio);

            $origemLaboratorio = $this->origemLaboratorio->getTotalExamesSolicitadosPsy($dataInicio, $dataFim, $idExecutivo);
            $origemLaboratorioTransformer = new OrigemLaboratorioTransformer(OrigemLaboratorio::FIELDS_SELECTED);
            $origemLaboratorioTransformer = $origemLaboratorioTransformer->transform($origemLaboratorio, $dataInicio);


            $origemLaboratorioCltCnh = $this->origemLaboratorioCltCnh->getTotalExamesSolicitadosPsy($dataInicio, $dataFim, $idExecutivo);
            $origemLaboratorioCltCnhTransoformer = new OrigemLaboratorioCltCnhTransformer(OrigemLaboratorioCltCnh::FIELDS_SELECTED);
            $origemLaboratorioCltCnhTransoformer = $origemLaboratorioCltCnhTransoformer->transform($origemLaboratorioCltCnh, $dataInicio);

            $this->origemCaged->setUsuario($user);
            $origemCaged = $this->origemCaged->getTotalExamesSolicitadosPsy($dataInicio, $dataFim, $idExecutivo);
            $origemCagedTransformer = new OrigemCagedTransformer(OrigemCaged::FIELDS_SELECTED);
            $origemCagedTransformer = $origemCagedTransformer->transform($origemCaged, $dataInicio);

            return collect([
                "periodo" => $dataInicio->format("d/m/Y"),
                "origemBasica" => $origemBasicaTransformer,
                "origemLaboratorio" => $origemLaboratorioTransformer,
                "origemLaboratorioCltCnh" => $origemLaboratorioCltCnhTransoformer,
                "origemCaged" => $origemCagedTransformer
            ]);
        }

        if ($user->isUserPardini()) {
            $origemBasica = $this->origemBasica->getTotalExamesSolicitadosPardini($dataInicio, $dataFim, $idExecutivo);
            $origemBasicaTransformer = new OrigemBasicaTransformer(OrigemBasica::FIELDS_SELECTED);
            $origemBasicaTransformer = $origemBasicaTransformer->transform($origemBasica, $dataInicio);

            $origemLaboratorio = $this->origemLaboratorio->getTotalExamesSolicitadosPardini($dataInicio, $dataFim, $idExecutivo);
            $origemLaboratorioTransformer = new OrigemLaboratorioTransformer(OrigemLaboratorio::FIELDS_SELECTED);
            $origemLaboratorioTransformer = $origemLaboratorioTransformer->transform($origemLaboratorio, $dataInicio);


            $origemLaboratorioCltCnh = $this->origemLaboratorioCltCnh->getTotalExamesSolicitadosPardini($dataInicio, $dataFim, $idExecutivo);
            $origemLaboratorioCltCnhTransoformer = new OrigemLaboratorioCltCnhTransformer(OrigemLaboratorioCltCnh::FIELDS_SELECTED);
            $origemLaboratorioCltCnhTransoformer = $origemLaboratorioCltCnhTransoformer->transform($origemLaboratorioCltCnh, $dataInicio);

            $this->origemCaged->setUsuario($user);
            $origemCaged = $this->origemCaged->getTotalExamesSolicitadosPardini($dataInicio, $dataFim, $idExecutivo);
            $origemCagedTransformer = new OrigemCagedTransformer(OrigemCaged::FIELDS_SELECTED);
            $origemCagedTransformer = $origemCagedTransformer->transform($origemCaged, $dataInicio);


            return collect([
                "periodo" => $dataInicio->format("d/m/Y"),
                "origemBasica" => $origemBasicaTransformer,
                "origemLaboratorio" => $origemLaboratorioTransformer,
                "origemLaboratorioCltCnh" => $origemLaboratorioCltCnhTransoformer,
                "origemCaged" => $origemCagedTransformer
            ]);
        }

        throw new Exception("Usuário de perfil inválido, não é nem Pardini e nem Psy.", 400);
    }
}
