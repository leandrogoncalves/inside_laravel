<?php

namespace Inside\Models;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    protected $table = 'azoprfrm';

    const ORIGEM_ALIAS = [
        'CLI' => 'Painel Empresa',
        'LAB' => 'Laboratório Outros',
        'LABC' => 'Laboratório CNH',
        'LABT' => 'Laboratório CLT',
        'MAP' => 'Vendas site',
        'SIS' => 'Pedido Manual',
        'TEL' => 'Televendas',
        'CAG' => 'CAGED',
    ];

    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class, "PesPesLabAuto", "PesPesLabAuto");
    }
}
