<?php

namespace Inside\Models;

use Illuminate\Database\Eloquent\Model;

class VendaLaboratorio extends Model
{
    protected $table = 'dw_vendas_laboratorios';
    protected $connection = 'inteligencia';

    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class, "id_laboratorio", "PesPesLabAuto");
    }
}
