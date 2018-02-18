<?php

namespace Inside\Models;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    protected $table = 'pespeslab';

    public function formulario()
    {
        return $this->hasMany(Formulario::class, "PesPesLabAuto", "PesPesLabAuto");
    }

    public function vendaOrigem()
    {
        return $this->hasMany(VendaOrigem::class, "id_laboratorio", "PesPesLabAuto");
    }

    public function vendaLaboratorio()
    {
        return $this->hasOne(VendaLaboratorio::class, "id_laboratorio", "PesPesLabAuto");
    }
}
