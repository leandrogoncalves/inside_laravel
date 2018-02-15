<?php

namespace Inside\Models;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    protected $table = 'azoprfrm';

    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class, "PesPesLabAuto", "PesPesLabAuto");
    }
}
