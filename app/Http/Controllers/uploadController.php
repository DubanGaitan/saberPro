<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class uploadController extends Controller
{
	public function uploadImage(Request $request){
		var_dump($request);exit();
        $image = $request->file('Imagen');

        $destination = $_SERVER['DOCUMENT_ROOT'] . '/img/preguntas/';
        //$destination = '/public/notes/';

        if (!empty($image)) {
            $filename = $image->getClientOriginalName();
            $image->move($destination, $filename);
            return response()->json(["link"=>$destination.$filename]);
        }else{
            $filename = '';
            return response()->json(["link"=>'joel'],200);
        }

	}

}
