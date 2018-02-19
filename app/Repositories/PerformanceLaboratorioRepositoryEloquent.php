<?php

namespace Inside\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Inside\Repositories\Contracts\PerformanceLaboratorioRepository;
use Inside\Models\PerformanceLaboratorio;
use Inside\Validators\PerformanceLaboratorioValidator;

/**
 * Class PerformanceLaboratorioRepositoryEloquent.
 *
 * @package namespace Inside\Repositories;
 */
class PerformanceLaboratorioRepositoryEloquent extends BaseRepository implements PerformanceLaboratorioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PerformanceLaboratorio::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function toSql()
    {
        return $this->model->toSql();
    }
    
}
