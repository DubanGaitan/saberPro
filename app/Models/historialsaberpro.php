<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class historialsaberpro extends Model
{
    public $timestamps = false;

    protected $fillable = ['año', 'periodo', 'puntaje', 'competencias_idCompetencias',];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modulo()
    {
        return $this->belongsTo('App\Models\Competencia', 'competencias_idCompetencias');
    }

}
