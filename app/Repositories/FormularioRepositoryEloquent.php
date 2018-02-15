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

    public function getLaboratorios($dataInicio = '2018-02-01 00:00:00', $dataFim = '2018-02-12 23:59:59')
    {
        $this->model = $this->model
        ->where("OprFrmDtHrIncl", ">=", $dataInicio)
        ->where("OprFrmDtHrIncl", "<=", $dataFim)
        ->where("OprFrmStatus", "<>", "C")
        ->where("OprFrmOrigem", "<>", "CAG")
        ->where("OprFrmOrigem", "<>", "LAB");

        return $this;
    }

    public function groupBy($by)
    {
        $this->model = $this->model->groupBy($by);

        return $this;
    }
}
