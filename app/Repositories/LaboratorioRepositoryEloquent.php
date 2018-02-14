<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\LaboratorioRepository;
use App\Models\Laboratorio;
use App\Validators\LaboratorioValidator;

/**
 * Class LaboratorioRepositoryEloquent.
 *
 * @package namespace App\Repositories;
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
