<?php

namespace Inside\Domain\SolicitacoesExames\Pardini;

use Inside\Repositories\Contracts\ExecutivoPardiniRepository;

class Executivos
{
    private $repository;

    public function __construct(ExecutivoPardiniRepository $repository)
    {
        $this->repository = $repository;
    }
    public function getIdExecutivoByCodigoExecutivo(int $id)
    {
        return $this->repository->findByField('cod_executivo', $id, ['id_laboratorio'])->toArray();
    }

    public function getIdExecutivoByCodigoSupervisor(int $id)
    {
        return $this->repository->findByField('cod_supervisor', $id, ['id_laboratorio'])->toArray();
    }

    public function getIdExecutivoByCodigoGerente(int $id)
    {
        return $this->repository->findByField('cod_gerente', $id, ['id_laboratorio'])->toArray();
    }

    public function getIdExecutivoByAdmin()
    {
        return $this->repository->all(['id_laboratorio'])->toArray();
    }
}
