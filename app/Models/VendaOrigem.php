<?php

namespace Inside\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class VendaOrigem extends Model
{
    protected $table = 'dw_vendas_origem';
    protected $connection = 'inteligencia';

    protected $dates = ['data_inclusao'];

    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class, "id_laboratorio", "PesPesLabAuto");
    }
}
