<?php

namespace Inside\Services\SolicitacoesExames\Pardini;

use Inside\Repositories\Contracts\ExecutivoPardiniRepository;

class Executivos
{
    private $repository;

    public function __construct(ExecutivoPardiniRepository $repository)
    {
        $this->repository = $repository;
    }
    public function getIdExecutivoByCodigoExecutivo()
    {
        return $this->repository->findByField('codigo_executivo', 12007, ['id_executivo'])->implode("id_executivo", ",");
    }

    public function getIdExecutivoByCodigoSupervisor()
    {
        return $this->repository->findByField('codigo_supervisor', 110, ['id_executivo'])->implode("id_executivo", ",");
    }

    public function getIdExecutivoByCodigoGerente()
    {
        return $this->repository->findByField('codigo_gerente', 10, ['id_executivo'])->implode("id_executivo", ",");
    }
}
