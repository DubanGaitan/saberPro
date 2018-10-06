<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cuestionario extends Model
{
    //public $timestamps = false;
    protected $fillable = ['idCuestionarios', 'cuestionarioNombre', 'cuestionarioTema', 'fechaCread', 'fechaLimite', 'competencias_idCompetencias'];
}
