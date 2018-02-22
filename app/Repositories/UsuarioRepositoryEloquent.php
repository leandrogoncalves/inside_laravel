<?php
/**
 * Created by PhpStorm.
 * User: leandro-psychemedics
 * Date: 17/02/18
 * Time: 22:23
 */

namespace Inside\Repositories;

use Inside\Models\Usuario;
use Inside\Repositories\Contracts\UsuarioRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;


class UsuarioRepositoryEloquent extends BaseRepository implements UsuarioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Usuario::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


}
