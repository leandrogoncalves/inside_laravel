<?php

namespace Inside\Repositories;

use Inside\Models\VendaLaboratorioGlaudyson;
use Inside\Repositories\Contracts\VendaLaboratorioGlaudysonRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Inside\Validators\VendaLaboratorioValidator;


class VendaLaboratorioGlaydysonRepositoryEloquent extends BaseRepository implements VendaLaboratorioGlaudysonRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VendaLaboratorioGlaudyson::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}