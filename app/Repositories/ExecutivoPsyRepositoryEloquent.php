<?php

namespace Inside\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Inside\Repositories\Contracts\ExecutivoPsyRepository;
use Inside\Models\ExecutivoPsy;
use Inside\Validators\ExecutivoPsyValidator;

/**
 * Class ExecutivoPsyRepositoryEloquent.
 *
 * @package namespace Inside\Repositories;
 */
class ExecutivoPsyRepositoryEloquent extends BaseRepository implements ExecutivoPsyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ExecutivoPsy::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
