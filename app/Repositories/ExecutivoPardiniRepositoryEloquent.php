<?php

namespace Inside\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Inside\Repositories\Contracts\ExecutivoPardiniRepository;
use Inside\Models\ExecutivoPardini;
use Inside\Validators\ExecutivoPardiniValidator;

/**
 * Class ExecutivoPardiniRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ExecutivoPardiniRepositoryEloquent extends BaseRepository implements ExecutivoPardiniRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ExecutivoPardini::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
