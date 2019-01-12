@extends('layouts.app')

@section('contStyle')
    <!--link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/summernote-master/dist/summernote.css') }}"-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/summernote/dist/summernote-lite.css') }}">
	<style type="text/css">
		.card{
			margin-bottom: .1rem !important;
		}
	</style>
@endsection

@section('sectionContent')
<div id="newHistory">
	<div class="modal fade bs-example-modal-lg" tabindex="0" role="dialog" aria-labelledby="myLargeModalLabel" id="modaladd">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	       <div class="modal-header">
	        <h4 class="modal-title" id="myModalLabel"> Respuestas </h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      </div>
			<div class="modal-body">
				<div id="accordion">
				  <div class="card">
				    <div class="card-header" id="headingOne">
				      <h5 class="mb-0">
				        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
				          Respuesta A 
				        </button>
				      </h5>
				    </div>
				    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
				      <div class="card-body">
				      	<div id="summernoteRespA"></div>
				      	<input type="radio" id="A" name="A" v-model="Correcta" value="A"> Correcta?
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingTwo">
				      <h5 class="mb-0">
				        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				          Respuesta B
				        </button>
				      </h5>
				    </div>
				    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      <div class="card-body">
				      	<div id="summernoteRespB"></div>
				      	<input type="radio" id="B" name="B" v-model="Correcta" value="B"> Correcta?
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingThree">
				      <h5 class="mb-0">
				        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				          Respuesta C
				        </button>
				      </h5>
				    </div>
				    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
				      <div class="card-body">
				      	<div id="summernoteRespC"></div>
				      	<input type="radio" id="C" name="C" v-model="Correcta" value="C"> Correcta?
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingThree">
				      <h5 class="mb-0">
				        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
				          Respuesta D
				        </button>
				      </h5>
				    </div>
				    <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
				      <div class="card-body">
				      	<div id="summernoteRespD"></div>
				      	<input type="radio" id="D" name="D" v-model="Correcta" value="D"> Correcta?
				      </div>
				    </div>
				  </div>
				</div>
			</div>
	    </div>
	  </div>
	</div>

	<div id="">
	    <div class="row">
	        <div class="content mt-3">
	            <div class="animated fadeIn">
	                <div class="row">
	                  <div class="col-lg-12">
	                    <div class="card">
	                        <div class="card-header">
	                            <strong class="card-title">Preguntas</strong>
	                        </div>
	                        <div class="card-body">
	                          <!-- Credit Card -->
	                          <div id="pay-invoice">
	                              <div class="card-body">
	                                  <div class="card-title">
	                                      <h3 class="text-center">Nueva Pregunta</h3>
	                                  </div>
	                                  <hr>
	                                  <form  @submit.prevent="newPregunta" novalidate="novalidate">
	                                  	{{ csrf_field() }}
	                                  	<div class="row">
	                                      <div class="col-md-12 form-group">
		                                      <div class="col-md-1">
					                            	<label for="select" class="control-label">Modulo</label>
					                          </div>
					                          <div class="col-12 col-md-4">
					                            <select name="select" id="select" class="form-control" v-model="modulo">
					                              <option selected disabled>Seleccione..</option>
					                              @foreach($competencias as $competencia)
					                              	<option value="{{ $competencia->id }}">{{ $competencia->nombreCompe }}</option>
					                              @endforeach
					                            </select>
					                          </div>
					                      	  <div class="col-md-2">
					                            <label for="select" class="control-label">Titulo/detalle</label>
					                          </div>
					                          <div class="col-12 col-md-4">
					                            <input type="text" name="titulo" id="titulo" v-model="titulo" class="form-control">
					                          </div>
				                          </div>
				                        </div>
				                        <div class="row">
				                          	<div class="col-md-12 form-group">
				                          		<div class="bnt-info col-md-2">
						                        	<label for="select" class="control-label">Enunciado</label>
						                        </div>
						                    	
						                        <!--div class="offset-md-6 col-md-2">Respuestas</div-->
						                        <div class=" offset-md-4 col-md-3">
						                         	<input type="button" data-toggle="modal" data-target="#modaladd" name="more" class="btn btn-success" style="margin-bottom: 15px;width:100%;" v-model="button" >
						                         </div>
						                         <div class="col-md-2">
						                         	<label>Correcta: [[ Correcta ]]</label>
						                        </div>
					                        </div>
					                    </div>
										<div class="row">
											<div class="col-12 col-md-12 form-group">
												<div id="summernote" class="col-md-12"></div>
											</div>
				                        </div>
				                          <br>
	                                    <div class="col-12 col-md-12">
	                                          <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
	                                              <i class="fa  fa-plus-square"></i>&nbsp;
	                                              <span id="payment-button-amount" >Guardar</span>
	                                              <span id="payment-button-sending" style="display:none;">Guardando…</span>
	                                          </button>
	                                    </div>
	                                  </form>
	                              </div>
	                          </div>
	                        </div>
	                    </div> <!-- .card -->
	                  </div><!--/.col-->
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>


@endsection

@section('sectionScript')

    <script src="{{ URL::asset('js/jquery/jquery-3.3.1.min.js') }}"></script>
    <!--script src="{{ URL::asset('js/bootstrap.min.js') }}"></script-->
    <!--script src="{{ URL::asset('vendor/summernote-master/dist/summernote.js') }}"></script-->	
    <script type="text/javascript" src="{{ URL::asset('vendor/summernote/dist/summernote-lite.js') }}"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$('#summernote').summernote({
				placeholder: 'Escribe aqui su enunciado',
				tabsize: 2,
				height: 200,
				minHeight: null,             // set minimum height of editor
					maxHeight: null,             // set maximum height of editor
					focus: true                  // set focus to editable area after initializing summernote
			});
			$('#summernoteRespA').summernote({
				placeholder: 'Escribe aqui su enunciado',
				tabsize: 2,
				height: 150,
				minHeight: null,             // set minimum height of editor
					maxHeight: null,             // set maximum height of editor
					focus: true                  // set focus to editable area after initializing summernote
			});
			$('#summernoteRespB').summernote({
				placeholder: 'Escribe aqui su enunciado',
				tabsize: 2,
				height: 150,
				minHeight: null,             // set minimum height of editor
					maxHeight: null,             // set maximum height of editor
					focus: true                  // set focus to editable area after initializing summernote
			});
			$('#summernoteRespC').summernote({
				placeholder: 'Escribe aqui su enunciado',
				tabsize: 2,
				height: 150,
				minHeight: null,             // set minimum height of editor
					maxHeight: null,             // set maximum height of editor
					focus: true                  // set focus to editable area after initializing summernote
			});
			$('#summernoteRespD').summernote({
				placeholder: 'Escribe aqui su enunciado',
				tabsize: 2,
				height: 150,
				minHeight: null,             // set minimum height of editor
					maxHeight: null,             // set maximum height of editor
					focus: true                  // set focus to editable area after initializing summernote
			});
		});
	</script>
	<!-- Vuejs -->
	<script type="text/javascript">
		new Vue({
			el:'#newHistory',
			delimiters: ['[[', ']]'],
			data:{
				modulo : 'Seleccione..',
				enunciado: '',
				titulo: '',
				Correcta: '',
				button: 'Añadir Respuesta',
			},
			methods:{
				newPregunta: function(){
					event.preventDefault();
					axios.post('/Question/newQuestion', {
						modulo : this.modulo,
						enunciado : $('#summernote').summernote('code'),
						respuestaA : $('#summernoteRespA').summernote('code'),
						respuestaB : $('#summernoteRespB').summernote('code'),
						respuestaC : $('#summernoteRespC').summernote('code'),
						respuestaD : $('#summernoteRespD').summernote('code'),
						titulo: this.titulo,
						Correcta: this.Correcta,
					})
					.then(
			        	response => {
		        	})
		        	.catch(function (error) {
		        		if (error.response) {
						}
					});
				},

			},
			mounted: function(){

			}
		});
	</script>



@endsection
