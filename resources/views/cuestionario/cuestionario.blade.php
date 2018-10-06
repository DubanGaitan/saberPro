@extends('layouts.app')

@section('sectionContent')

<div id="newCuestionary">
    <div class="row">
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Cuestionario</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                            <div class="card-body">
                              <div class="card-title">
                                  <h3 class="text-center">Nuevo Cuestionario</h3>
                              </div>
                              <form  @submit.prevent="newQuestionnaire" novalidate="novalidate">
                                {{ csrf_field() }}
                                <div class="col-md-1">
                                  <label for="select" class="control-label">Modulo</label>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                  <select name="select" id="select" class="form-control" v-model="modulo">
                                    <option selected disabled>Seleccione..</option>
                                    @foreach($competencias as $competencia)
                                      <option value="{{ $competencia->idCompetencias }}">{{ $competencia->nombreCompe }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="col-md-12 form-group">
                                  <hr>
                                  <div class="col-12 col-md-1">
                                    <label class="control-label">Nombre</label>
                                  </div>
                                  <div class="col-12 col-md-5">
                                    <input type="text" class="form-control" name="questionaryname" placeholder="Nombre del cuestionario" v-model="nombrecuestio">
                                  </div>
                                  <div class="col-12 col-md-1">
                                    <label class="control-label">Tema</label>
                                  </div>
                                  <div class="col-12 col-md-5">
                                    <input type="text" class="form-control" name="questionaryTema" placeholder="Tema del cuestionario" v-model="temacuestio">
                                  </div>
                                </div>
  		                          <br>
                                <!hr>
  		                          <div class="col-md-12 form-group">
    			                       <hr>
                                    <!--button type="button" class="col-md-4 btn btn-secondary mb-1" data-toggle="modal" data-target="#largeModalQuestion"><i class="fa fa-search">Buscar pregunta</i></button>
                                    <button type="button" class="col-md-4 btn btn-secondary mb-1" data-toggle="modal" data-target="#largeModalAddQuestion">Nueva Pregunta</button-->
                                </div>
                                <!--div class="col-12 col-md-12">
    							               	<div class="">
    							    	            <table class="table">
    						                      <thead class="thead-dark">
    						                        <tr>
    						                          <th scope="col"></th>
    						                          <th scope="col">Codigo</th>
    						                          <th scope="col">Detalle</th>
    						                          <th scope="col">Modulo</th>
    						                        </tr>
    						                      </thead>
    						                      <tbody>
    						                        <tr>
    						                          <th scope="row">
    						                          	<button type="submit" class="btn btn-success btn-sm">
    							                          <i class="fa fa-pencil"></i>
    							                        </button>
    							                        <button type="reset" class="btn btn-danger btn-sm">
    							                          <i class="fa fa-ban"></i> 
    							                        </button>
    						                          </th>
    						                          <td>CC0001021</td>
    						                          <td>Reacion enfrente a una situacion que puede perjudicar tu trabajo</td>
    						                          <td>Competencias Ciudadanas</td>
                                        </tr>
                                        <tr>
    						                          <th scope="row">
    						                          	<button type="submit" class="btn btn-success btn-sm">
    							                          <i class="fa fa-pencil"></i>
    								                        </button>
    								                        <button type="reset" class="btn btn-danger btn-sm">
    								                          <i class="fa fa-ban"></i> 
    								                        </button>
    						                          </th>
    						                          <td>CC0001402</td>
    						                          <td>Toma de desiciones si estuvieras en peligro</td>
    						                          <td>Competencias Ciudadanas</td>
                                        </tr>
                                        <tr>
    						                          <th scope="row">
    						                          	<button type="submit" class="btn btn-success btn-sm">
    							                          <i class="fa fa-pencil"></i>
    								                        </button>
    								                        <button type="reset" class="btn btn-danger btn-sm">
    								                          <i class="fa fa-ban"></i> 
    								                        </button>
    						                          </th>
    						                          <td>CC0001425</td>
    						                          <td>Conoce los derechos y deberes que la Constitución consagra.</td>
    						                          <td>Competencias Ciudadanas</td>
    						                        </tr>
    						                      </tbody>
                                    </table>
    							                </div>
                                </div-->
                                 <br>
                                 <br>
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


<div class="modal fade" id="largeModalQuestion" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Seleccione pregunta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            	<div class="col-12 col-md-12">
            		<div class="row">
            			<div class="col-12 col-md-1">
		           			<label for="searchQuestion" class="control-label">
		           				Buscar
		           			</label>
	           			</div>
	           			<div class="input-group col-12 col-md-5">
	           				<input type="text" class="form-control" @keyup="searchQuestion" name="searchQuestion" id="searchQuestion" placeholder="Escriba..">
	           				<button type="button" name="btnSearchQuestion" class="btn btn-secondary mb-1 input-group-addon"><i class="fa fa-search"></i></button>
	           			</div>
	           			<div class="">
	           			</div>
            		</div>
            	</div>
            	<br>
            	<br>
            	<hr class="row">
            	<div></div>
            	<div class="">
    	            <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">Seleccionar</th>
                          <th scope="col">Codigo</th>
                          <th scope="col">Detalle</th>
                          <th scope="col">Modulo</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row"><input type="checkbox" name=""></th>
                          <td>CC0001021</td>
                          <td>Reacion enfrente a una situacion que puede perjudicar tu trabajo</td>
                          <td>Competencias Ciudadanas</td>
                        </tr>
                        <tr>
                          <th scope="row"><input type="checkbox" name=""></th>
                          <td>CC0001402</td>
                          <td>Toma de desiciones si estuvieras en peligro</td>
                          <td>Competencias Ciudadanas</td>
                        </tr>
                        <tr>
                          <th scope="row"><input type="checkbox" name=""></th>
                          <td>CC0001425</td>
                          <td>¿ La historia nos guía ?</td>
                          <td>Competencias Ciudadanas</td>
                        </tr>
                      </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="largeModalAddQuestion" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Nueva pregunta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            	<div class="col-12 col-md-12">
            		<div class="row">
	           			<div class="col-12 col-md-6 form-group">
	           				<label class="col-md-2">Titulo</label>
	           				<input type="text" name="" class="form-control col-md-10" placeholder="Escriba el titulo">
	           			</div>
	           			<div class="col-12 col-md-6 form-group">
	           				<label class="col-md-2">Enunciado</label>
	           				<input type="text" name="" class="form-control col-md-10" placeholder="">
	           			</div>
            		</div>
            		<div class="">
            		<label class="">Respuestas</label>
            		</div>
	           		<div class="col-md-10 form-group">
           			    <table class="table">
                          <thead>
                            <tr>
                              <!--th scope="col">#</th-->
                              <th scope="col"></th>
                              <th scope="col">Correcta</th>
                              <!--th scope="col"></th-->
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <!--th scope="row">1</th-->
                              <td><input type="text" class="form-control" name="" placeholder=""></td>
                              <td><input type="radio" name="" value="1"></td>
                              <!--td>@mdo</td-->
                            </tr>
                            <tr>
                              <!--th scope="row">1</th-->
                              <td><input type="text" class="form-control" name="" placeholder=""></td>
                              <td><input type="radio" name="" value="2"></td>
                              <!--td>@mdo</td-->
                            </tr>
                            <tr>
                              <!--th scope="row">1</th-->
                              <td><input type="text" class="form-control" name="" placeholder=""></td>
                              <td><input type="radio" name="" value="3"></td>
                              <!--td>@mdo</td-->
                            </tr>
                            <tr>
                              <!--th scope="row">1</th-->
                              <td><input type="text" class="form-control" name="" placeholder=""></td>
                              <td><input type="radio" name="" value="4"></td>
                              <!--td>@mdo</td-->
                            </tr>
                          </tbody>
                        </table>

	           		</div>
            	</div>
            	<br>
            	<br>
            	<hr class="row">
            	<div></div>
            	<div class="row">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('sectionScript')
	<script>
		new Vue({
			el:'#newCuestionary',
			delimiters: ['[[', ']]'],
			data:{
        modulo : 'Seleccione..',
        nombrecuestio : '',
        temacuestio : '',
			},
			methods:{
        newQuestionnaire: function(){
          event.preventDefault();
          axios.post('/Questionnaire/newQuestionnaire',{
            nombCuest : this.nombrecuestio,
            tema : this.temacuestio,
            modulo : this.modulo,
          })
          .then(
            response=> {
              event.target.reset();
              return response.json();
            }
          )
        },
				searchQuestion: function(){
				},
				newPregunta: function(){
					event.preventDefault();
					axios.post('/history/new', {
						modulo : this.modulo,
						año : this.año,
						periodo : this.periodo,
						puntaje : this.puntaje
					})
					.then(
			        	response => {
							event.target.reset();
		        			return response.json();
		        	})
		        	.catch(function (error) {
		        		if (error.response) {
						}
					});
				},
			},
		});
	</script>

@endsection
