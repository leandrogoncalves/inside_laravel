<?php

namespace Inside\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Inside\Repositories\Contracts\VendaOrigemRepository;
use Inside\Models\VendaOrigem;
use Inside\Validators\VendaOrigemValidator;

/**
 * Class VendaOrigemRepositoryEloquent.
 *
 * @package namespace Inside\Repositories;
 */
class VendaOrigemRepositoryEloquent extends BaseRepository implements VendaOrigemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VendaOrigem::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function groupBy($by)
    {
        $this->model = $this->model->groupBy($by);

        return $this;
    }
}
