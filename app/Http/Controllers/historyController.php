<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

## use models ##
use App\Models\años;
use App\Models\periodos;
use App\Models\competencia;
use App\User;
use App\Models\Historialsaberpro;



class historyController extends Controller
{
    public function viewHistory()
    {
    	$años = años::all();
    	$periodos = periodos::all();
    	$competencias = competencia::all();
    	$user = User::all();
    	//var_dump($user[0]['name']);exit();
    	//var_dump($competencias->nombreCompe);exit();
    	return view('history/enterHistory',[
    		'años' => $años,
    		'periodos' => $periodos,
    		'competencias' => $competencias
    	]);
    }
    public function newHistory(Request $request)
    {
        foreach ($request->all()['resultados'] as $key => $register) {
            //var_dump($request->all()['resultados'][$key]);
        	$newHistory = Historialsaberpro::create([
                'año' => $request->all()['resultados'][$key]['ano'],
                'periodo' => $request->all()['resultados'][$key]['periodo'],
                'puntaje' => $request->all()['resultados'][$key]['puntaje'],
                'competencias_idCompetencias' => $request->all()['modulo']
            ]);
        }
        return response()->json(['success' => 'Resultado(s) registrado']);
    }

    public function viewgrafica(){

        $años = años::all();
        $periodos = periodos::all();
        $competencias = competencia::all();
        $user = User::all();
        //var_dump($user[0]['name']);exit();
        //var_dump($competencias->nombreCompe);exit();
        return view('history\grafica',[
            'años' => $años,
            'periodos' => $periodos,
            'competencias' => $competencias
        ]);
    }

    public function graficar(Request $request){
        

        $results = Historialsaberpro::where('año','>=',$request->all()['anoIni'])
        ->where('año','<=',$request->all()['anoFin'])
        ->where('competencias_idCompetencias', $request->all()['modulo'])
        ->orderBy('año','ASC')->get();

        $ano = 0;  /////     2015
        $cont = 0;
        $puntTo = 0;      //  1      2      3      
        $arraypuntaje = array(); // 2014** 2014** 2014** 2015 2015 2016 2016 2016
        $arrayaño = array(); 
        $Prome = 0;
        //var_dump($request->all()['anoIni']);exit();
        foreach ($results as $key => $result) {
            if($cont == 0){
                $ano = $result->año;
            }
            if( $ano == $result->año){
                $puntTo += $result->puntaje;
            }else{
                $Prome = ($puntTo / $cont);
                $arrayaño[] = $ano;
                $arraypuntaje[] = $Prome;
                $ano = $result->año;
                $puntTo = 0;
                $puntTo = $result->puntaje;
                $cont = 0 ;
            }
            if($key + 1 == count($results)){
                $cont += 1;                
                $Prome = ($puntTo / $cont);
                $arrayaño[] = $ano;
                $arraypuntaje[] = $Prome;
            }
            $cont += 1;
        }
        return response()->json(['anos' => $arrayaño,
            'puntaje' => $arraypuntaje,
        ]);
    }
}

