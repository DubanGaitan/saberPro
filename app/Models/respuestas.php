<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class respuestas extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'detalle', 'correcta', 'preguntas_idPregunta'];
}
