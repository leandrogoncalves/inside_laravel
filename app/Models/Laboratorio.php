<?php

namespace Inside\Models;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    protected $table = 'pespeslab';
    protected $connection = 'mysql';

    public function formulario()
    {
        return $this->hasMany(Formulario::class, "PesPesLabAuto", "PesPesLabAuto");
    }

    public function vendaOrigem()
    {
        return $this->belongsTo(VendaOrigem::class, "id_laboratorio", "PesPesLabAuto");
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, "id_executivo_psy", "id_executivo_psy");
    }
}
