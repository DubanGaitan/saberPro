<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\años;
use App\Models\competencia;
use App\User;

class preguntaController extends Controller
{
    public function viewNewQuestion(){
    	$competencias = Competencia::all();
    	$años = años::all();
    	return view('pregunta\pregunta',[
    		'competencias' => $competencias,
    		'años' => $años, 
    	]);
    }
}
