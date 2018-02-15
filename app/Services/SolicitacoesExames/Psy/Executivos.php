<?php

namespace Inside\Services\SolicitacoesExames\Psy;

use Inside\Repositories\Contracts\ExecutivoPsyRepository;

class Executivos
{
    private $repository;

    public function __construct(ExecutivoPsyRepository $repository)
    {
        $this->repository = $repository;
    }
    public function getIdExecutivoByCodigoExecutivo()
    {
        return collect(($this->repository->findByField('codigo_executivo', 12007, ['id_executivo'])->toArray()))->collapse()->all();
    }

    public function getIdExecutivoByCodigoSupervisor()
    {
        return $this->repository->findByField('codigo_supervisor', 110, ['id_executivo'])->implode("id_executivo", ",");
    }

    public function getIdExecutivoByCodigoGerente()
    {
        return $this->repository->findByField('codigo_gerente', 10, ['id_executivo'])->toArray();
    }
}
