<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\años;
use App\Models\periodos;
use App\Models\competencia;
use App\User;
use App\Models\Historialsaberpro;
use App\Models\cuestionario;

class cuestionarioController extends Controller
{
    public function viewNewQuestionnaire(){
    	$años = años::all();
    	$periodos = periodos::all();
    	$competencias = competencia::all();
    	$user = User::all();
    	//var_dump($user[0]['name']);exit();
    	//var_dump($competencias->nombreCompe);exit();
    	return view('cuestionario\cuestionario',[
    		'años' => $años,
    		'periodos' => $periodos,
    		'competencias' => $competencias
    	]);
    }

    public function NewQuestionnaire(Request $request){

        $newCuestionario = Cuestionario::create([
            'cuestionarioNombre' => $request->all()['nombCuest'],
            'cuestionarioTema' => $request->all()['tema'],
            'fechaCread' => NULL,
            'fechaLimite' => NULL,
            'competencias_idCompetencias' => $request->all()['modulo'],
        ]);
        return response()->json([
            'success' => 'Cuestionario Creado'
        ]);
    }
}
