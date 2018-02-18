<?php

namespace Inside\Models;

use Illuminate\Database\Eloquent\Model;

class VendaLaboratorioGlaudyson extends Model
{
    protected $table = 'dw_acumulado_glaudyson';
    protected $connection = 'inteligencia';

    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class, "id_laboratorio", "PesPesLabAuto");
    }
}
