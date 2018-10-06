<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/history/add','historyController@viewHistory');
Route::post('/history/new','historyController@newHistory');
Route::get('/history/grafica','historyController@viewgrafica');
Route::post('/history/grafica','historyController@graficar');


Route::get('/pregunta/nueva','preguntaController@nuevaPregunta');

Route::get('/Question/newQuestion','preguntaController@viewNewQuestion');

Route::post('/Question/newQuestion','preguntaController@newQuestion');

Route::get('/question/list','preguntaController@listQuestion');

Route::get('/Questionnaire/newQuestionnaire','cuestionarioController@viewNewQuestionnaire');

Route::post('/Questionnaire/newQuestionnaire','cuestionarioController@NewQuestionnaire');

Route::get('/questionary/list','cuestionarioController@listQuestionary');

Route::post('/uploadImage/editText{command}','uploadController@uploadImage');
