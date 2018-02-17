<?php

namespace Inside\Models;

use Illuminate\Database\Eloquent\Model;

class VendaOrigem extends Model
{
    protected $table = 'dw_vendas_origem';
    protected $connection = 'inteligencia';

    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class, "id_laboratorio", "PesPesLabAuto");
    }
}
