<?php

namespace Inside\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Inside\Repositories\Contracts\VendaLoteRepository;
use Inside\Models\VendaLote;
use Inside\Validators\VendaLoteValidator;

/**
 * Class VendaLoteRepositoryEloquent.
 *
 * @package namespace Inside\Repositories;
 */
class VendaLoteRepositoryEloquent extends BaseRepository implements VendaLoteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VendaLote::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
