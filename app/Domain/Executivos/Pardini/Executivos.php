<?php

namespace Inside\Domain\Executivos\Pardini;

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

    public function getIdGerenteByCodigoExecutivo(int $id)
    {
        return $this->repository->findByField('cod_executivo', $id, ['cod_gerente'])->toArray();
    }

    public function getIdGerenteByCodigoSupervisor(int $id)
    {
        return $this->repository->findByField('cod_supervisor', $id, ['cod_gerente'])->toArray();
    }

    public function getIdGerenteByCodigoGerente(int $id)
    {
        return $this->repository->findByField('cod_gerente', $id, ['cod_gerente'])->toArray();
    }

    public function getIdGerenteByAdmin()
    {
        return $this->repository->all(['cod_gerente'])->toArray();
    }
}
