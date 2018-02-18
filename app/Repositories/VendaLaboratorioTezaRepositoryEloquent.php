<?php

namespace Inside\Repositories;

use Inside\Models\VendaLaboratorioTeza;
use Inside\Repositories\Contracts\VendaLaboratorioGlaudysonRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Inside\Validators\VendaLaboratorioValidator;


class VendaLaboratorioTezaRepositoryEloquent extends BaseRepository implements VendaLaboratorioGlaudysonRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VendaLaboratorioTeza::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}