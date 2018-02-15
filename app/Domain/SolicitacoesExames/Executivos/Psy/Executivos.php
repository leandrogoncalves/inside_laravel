<?php

namespace Inside\Domain\SolicitacoesExames\Psy;

use Inside\Repositories\Contracts\ExecutivoPsyRepository;

class Executivos
{
    private $repository;

    public function __construct(ExecutivoPsyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getIdExecutivoByCodigoExecutivo(int $id)
    {
        return $this->repository->findByField('codigo_executivo', $id, ['id_executivo'])->toArray();
    }

    public function getIdExecutivoByCodigoSupervisor(int $id)
    {
        return $this->repository->findByField('codigo_supervisor', $id, ['id_executivo'])->toArray();
    }

    public function getIdExecutivoByCodigoGerente(int $id)
    {
        return $this->repository->findByField('codigo_gerente', $id, ['id_executivo'])->toArray();
    }

    public function getIdExecutivoByAdmin()
    {
        return $this->repository->all(['id_executivo'])->toArray();
    }
}
