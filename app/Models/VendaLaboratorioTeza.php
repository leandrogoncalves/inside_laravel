<?php

namespace Inside\Models;

use Illuminate\Database\Eloquent\Model;

class VendaLaboratorioTeza extends Model
{
    protected $table = 'dw_acumulado_teza';
    protected $connection = 'inteligencia';

    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class, "id_laboratorio", "PesPesLabAuto");
    }
}
