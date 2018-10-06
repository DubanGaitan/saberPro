@extends('layouts.app')

@section('sectionContent')
<div id="newHistory">
    <div class="row">
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Historial de Resultados</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                                  <div class="card-title">
                                      <h3 class="text-center">Nuevo Resultado</h3>
                                  </div>
                                  <hr>
                                  <form  @submit.prevent="newHistory" novalidate="novalidate">
                                  	{{ csrf_field() }}
                                      <!--div class="form-group text-center">
                                          <ul class="list-inline">
                                              <li class="list-inline-item"><i class="text-muted fa fa-cc-visa fa-2x"></i></li>
                                              <li class="list-inline-item"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                                              <li class="list-inline-item"><i class="fa fa-cc-amex fa-2x"></i></li>
                                              <li class="list-inline-item"><i class="fa fa-cc-discover fa-2x"></i></li>
                                          </ul>
                                      </div-->
                                      <div class="col-md-12">
	                                      <div class="col-md-1">
				                            	<label for="select" class="control-label">Modulo</label>
				                          </div>
				                          <div class="col-12 col-md-4">
				                            <select name="select" id="select" class="form-control" v-model="modulo">
				                              <option selected disabled>Seleccione..</option>
				                              @foreach($competencias as $competencia)
				                              	<option value="{{ $competencia->idCompetencias }}">{{ $competencia->nombreCompe }}</option>
				                              @endforeach
				                            </select>
				                          </div>
			                          </div>
			                          <br>
			                          <br>
                                  	  <hr>
                                      <div class="col-md-12 form-group" v-for="(resultado, index) in resultados">
			                            <div class="col-md-1">
			                            	<label for="select" class="control-label">Año</label>
			                            </div>
			                            <div class="col-12 col-md-2">
			                              <select name="select" id="select" class="form-control" v-model="resultado.ano">
			                                <option selected disabled>Seleccione..</option>
			                                @foreach($años as $año)
			                                	<option value="{{ $año->año }}">{{ $año->año }}</option>
			                                @endforeach
			                              </select>
			                            </div>
			                            <div class="col-md-1">
			                            	<label for="select" class="control-label mb-1">Periodo</label>
			                            </div>
			                            <div class="col-12 col-md-2">
			                              <select name="select" id="select" class="form-control" v-model="resultado.periodo">
			                                <option selected disabled>Seleccione..</option>
			                                @foreach($periodos as $periodo)
			                                	<option value="{{ $periodo->id }}">{{ $periodo->periodo }}</option>
			                                @endforeach
			                              </select>
			                            </div>
			                            
			                            <div class="col-md-1">
			                               <label for="cc-payment" class="control-label mb-1">Puntaje</label>
			                            </div>
			                            <div class="col-12 col-md-2">
                                          <input id="cc-payment" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" v-model="resultado.puntaje">
			                            </div>
			                            <div class="col-12 col-md-1">
			                              <a @click="removerResultado(index)" id="payment-button" class="btn btn-danger btn-block">
                                              <!--i class=""></i>&nbsp;-->
                                              <span id="payment-button-amount">-</span>
                                          </a>
                                        </div>
                                        <div class="col-12 col-md-1">
				                            <a @click="agregarResultado" id="payment-button" class="btn btn-info btn-block">
	                                              <!--i class=""></i>&nbsp;-->
	                                              <span id="payment-button-amount">+</span>
	                                          </a>
                                        </div>
                                        <div class="col-12 col-md-1">
                                        </div>
			                          </div>
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
@endsection

@section('sectionScript')
	<script>
		new Vue({
			el:'#newHistory',
			delimiters: ['[[', ']]'],
			data:{
				modulo : 'Seleccione..',
				form: {
					ano : 'Seleccione..',
					periodo : 'Seleccione..',
					puntaje : '',
				},
				resultados: []
			},
			methods:{
				removerResultado: function (index){
					this.resultados.splice(index, 1);
				},
				agregarResultado: function () {
					this.resultados.push({
						ano : 'Seleccione..',
						periodo : 'Seleccione..',
						puntaje : '',
					})
				},
				newHistory: function(){
					event.preventDefault();
					axios.post('/history/new', {
						modulo : this.modulo,
						resultados : this.resultados
					})
					.then(
			        	response => {
			        		this.resultados = [];
			        		this.agregarResultado();
							event.target.reset();
		        			return response.json();
		        	})
		        	.catch(function (error) {
		        		if (error.response) {
						}
					});
				}
			},
			mounted: function () {
				this.agregarResultado()
			}
		});
	</script>

@endsection
