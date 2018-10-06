<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class competencia extends Model
{
    protected $guarded = [];
    protected $fillable = ['idCompetencia', 'nombreCompe','activo'];
}
