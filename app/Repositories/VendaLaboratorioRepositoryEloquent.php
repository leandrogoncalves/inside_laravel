<?php

namespace Inside\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Inside\Repositories\Contracts\VendaLaboratorioRepository;
use Inside\Models\VendaLaboratorio;
use Inside\Validators\VendaLaboratorioValidator;

/**
 * Class VendaLaboratorioRepositoryEloquent.
 *
 * @package namespace Inside\Repositories;
 */
class VendaLaboratorioRepositoryEloquent extends BaseRepository implements VendaLaboratorioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VendaLaboratorio::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
