<?php

namespace Inside\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Inside\Repositories\Contracts\LaboratorioRepository;
use Inside\Models\Laboratorio;
use Inside\Validators\LaboratorioValidator;

/**
 * Class LaboratorioRepositoryEloquent.
 *
 * @package namespace Inside\Repositories;
 */
class LaboratorioRepositoryEloquent extends BaseRepository implements LaboratorioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Laboratorio::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
