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
                                      <h3 class="text-center">Seleccione Rangos de Periodos</h3>
                                  </div>
                                  <hr>
                                  <form  @submit.prevent="graficar" novalidate="novalidate">
                                  	{{ csrf_field() }}

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
				                        <hr>
				                        <div class="col-md-12">
				                          <div class="col-md-2">
				                            	<label for="select" class="control-label">FECHA INICIAL</label>
				                          </div>
				                          <div class="col-md-1">
				                            	<label for="select" class="control-label">Año</label>
				                          </div>
				                          <div class="col-12 col-md-2">
				                            <select name="select" id="select" class="form-control" v-model="anoIni">
				                              <option selected disabled>Seleccione..</option>
				                              @foreach($años as $año)
				                              	<option value="{{ $año->año }}">{{ $año->año }}</option>
				                              @endforeach
				                            </select>
				                          </div>
			                            </div>
			                            <div class="col-md-12" style="margin-bottom: 12px;">
				                          <div class="col-md-2">
				                            	<label for="select" class="control-label">FECHA FINAL</label>
				                          </div>
				                          <div class="col-md-1">
				                            	<label for="select" class="control-label">Año</label>
				                          </div>
				                          <div class="col-12 col-md-2">
				                            <select name="select" id="select" class="form-control" v-model="anoFin">
				                              <option selected disabled>Seleccione..</option>
				                              @foreach($años as $año)
				                              	<option value="{{ $año->año }}">{{ $año->año }}</option>
				                              @endforeach
				                            </select>
				                          </div>
			                            </div>
                                        <div class="col-12 col-md-12">
                                          <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                              <i class="fa  fa-plus-square"></i>
                                              <span id="payment-button-amount" >Graficar</span>
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
    <div class="row">
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Gráficas</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                        <div class="row form-group">
                            <div class="col col-md-2"><label class=" form-control-label">Tipo de gráfica</label></div>
                            <div class="col col-md-6">
                              <div class="form-check">
                                <div class="radio">
                                  <label for="radio1" class="form-check-label ">
                                    <input type="radio" id="radio1" name="radios" value="option1" class="form-check-input">Lineal
                                  </label>
                                </div>
                                <div class="radio">
                                  <label for="radio2" class="form-check-label ">
                                    <input type="radio" id="radio2" name="radios" value="option2" class="form-check-input">Barras
                                  </label>
                                </div>
                                <div class="radio">
                                  <label for="radio3" class="form-check-label ">
                                    <input type="radio" id="radio3" name="radios" value="option3" class="form-check-input">Torta
                                  </label>
                                </div>
                              </div>
                            </div>
                        </div>
                          
                          <div id="pay-invoice">
                              <div class="card-body">
                                  <div class="card-title">
                                     
                                  </div>
                                  <!hr>
                                  <div class="col-lg-6">
			                          <div class="card">
			                              <div class="card-body">
			                                  <h4 class="mb-3">Team Commits </h4>
			                                  <canvas id="team-chart"></canvas>
			                              </div>
			                          </div>
			                      </div>
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
		var vm = new Vue({
			el:'#newHistory',
			delimiters: ['[[', ']]'],
			data:{
				modulo : 'Seleccione..',
				anoIni : 'Seleccione..',
				anoFin : 'Seleccione..',
				anos : [],
				puntaje : [],
				//periodoIni : 'Seleccione..',
				//periodoFin : 'Seleccione..',
			},
			watch: {
				anos: function () {
					var temachart = document.getElementById( "team-chart" );
			        var myChart = new Chart( temachart, {
			            type: 'line',
			            data: {
			                labels: this.anos,
			                type: 'line',
			                defaultFontFamily: 'Montserrat',
			                datasets: [ {
			                    data: this.puntaje,
			                    label: "Expense",
			                    backgroundColor: 'rgba(0,103,255,.15)',
			                    borderColor: 'rgba(0,103,255,0.5)',
			                    borderWidth: 3.5,
			                    pointStyle: 'circle',
			                    pointRadius: 5,
			                    pointBorderColor: 'transparent',
			                    pointBackgroundColor: 'rgba(0,103,255,0.5)',
			                }, ]
			            },
			            options: {
			                responsive: true,
			                tooltips: {
			                    mode: 'index',
			                    titleFontSize: 12,
			                    titleFontColor: '#000',
			                    bodyFontColor: '#000',
			                    backgroundColor: '#fff',
			                    titleFontFamily: 'Montserrat',
			                    bodyFontFamily: 'Montserrat',
			                    cornerRadius: 3,
			                    intersect: false,
			                },
			                legend: {
			                    display: false,
			                    position: 'top',
			                    labels: {
			                        usePointStyle: true,
			                        fontFamily: 'Montserrat',
			                    },
			                },
			                scales: {
			                    xAxes: [ {
			                        display: true,
			                        gridLines: {
			                            display: false,
			                            drawBorder: false
			                        },
			                        scaleLabel: {
			                            display: false,
			                            labelString: 'Month'
			                        }
			                            } ],
			                    yAxes: [ {
			                        display: true,
			                        gridLines: {
			                            display: false,
			                            drawBorder: false
			                        },
			                        scaleLabel: {
			                            display: true,
			                            labelString: 'Value'
			                        }
			                    } ]
			                },
			                title: {
			                    display: false,
			                }
			            }
			        } );
				},
			},
			methods:{
				graficar: function(){

					event.preventDefault();
					axios.post('/history/grafica', {
						modulo : this.modulo,
						anoIni : this.anoIni,
						anoFin : this.anoFin,
						//periodoIni : this.periodoIni,
						//periodoFin : this.periodoFin
					})
					.then(
			        	response => {
							console.log(response.data['anos']);
							this.anos = response.data['anos'];
							this.puntaje = response.data['puntaje'];
							event.target.reset();
		        			return response.json();
		        	})
		        	.catch(function (error) {
		        		if (error.response) {
						}
					});
				}
			},
			

		});

	    var ctx = document.getElementById( "singelBarChart" );
	    if( ctx ){
	        ctx.height = 150;
	        var myChart = new Chart( ctx, {
		        type: 'bar',
		        data: {
			        labels: vm.anos,
		            datasets: [
		                {
		                    label: "Promedio por periodo",
		                    data: vm.puntaje,
		                    borderColor: "rgba(0, 123, 255, 0.9)",
		                    borderWidth: "0",
		                    backgroundColor: "rgba(0, 123, 255, 0.5)"
		                            }
		                        ]
		        },
		        options: {
		            scales: {
		                yAxes: [ {
		                    ticks: {
		                        beginAtZero: true
		                    }
	                    } ]
		            }
		        }
	        } );
	    }


	</script>

@endsection
