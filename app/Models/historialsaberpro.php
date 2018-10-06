<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class historialsaberpro extends Model
{
    public $timestamps = false;

    protected $fillable = ['año', 'periodo', 'puntaje', 'competencias_idCompetencias',];
}
