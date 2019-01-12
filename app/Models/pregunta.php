<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class pregunta extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'detallePregunta', 'enunciado', 'competencias_idCompetencias', 'tipoPregunta_idTipoPregunta', 'codigoPregunta'];
}
