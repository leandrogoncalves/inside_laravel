<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\ExecutivoPsyRepository;
use App\Models\ExecutivoPsy;
use App\Validators\ExecutivoPsyValidator;

/**
 * Class ExecutivoPsyRepositoryEloquent.
 *
 * @package namespace App\Repositories;
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
