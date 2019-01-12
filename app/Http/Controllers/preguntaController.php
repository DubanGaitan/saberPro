<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\años;
use App\Models\competencia;
use App\Models\Pregunta;
use App\Models\Respuestas;
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

    public function newQuestion(Request $request){
        
        $respA = 0;
        $respB = 0;
        $respC = 0;
        $respD = 0;


        if( $request->all()['Correcta'] == 'A'){
            $respA = 1;
        }else if( $request->all()['Correcta'] == 'B'){
            $respB = 1;
        }else if( $request->all()['Correcta'] == 'C'){
            $respC = 1;
        }else if( $request->all()['Correcta'] == 'D'){
            $respD = 1;
        }

        $newQuestion = Pregunta::create([
                'tipoPregunta_idTipoPregunta' => '2',
                'detallePregunta' => $request->all()['titulo'],
                'enunciado' => $request->all()['enunciado'],
                'competencias_idCompetencias' => $request->all()['modulo']
        ]);

        $newRespuA = Respuestas::create([
            'detalle' => $request->all()['respuestaA'],
            'correcta' => $respA,
            'preguntas_idPregunta' => $newQuestion->id,
        ]);
        $newRespuB = Respuestas::create([
            'detalle' => $request->all()['respuestaB'],
            'correcta' => $respB,
            'preguntas_idPregunta' => $newQuestion->id,
        ]);
        $newRespC = Respuestas::create([
            'detalle' => $request->all()['respuestaC'],
            'correcta' => $respC,
            'preguntas_idPregunta' => $newQuestion->id,
        ]);
        $newRespuD = Respuestas::create([
            'detalle' => $request->all()['respuestaD'],
            'correcta' => $respD,
            'preguntas_idPregunta' => $newQuestion->id,
        ]);

        return response()->json(['success' => 'Pregunta registrada']);
    	//var_dump($request->all()['enunciado']);exit();
    }
}
