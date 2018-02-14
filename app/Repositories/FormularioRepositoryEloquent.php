<?php

namespace Inside\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Inside\Repositories\Contracts\FormularioRepository;
use Inside\Models\Formulario;
use Inside\Validators\FormularioValidator;

/**
 * Class FormularioRepositoryEloquent.
 *
 * @package namespace Inside\Repositories;
 */
class FormularioRepositoryEloquent extends BaseRepository implements FormularioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Formulario::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
