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
                                      <h3 class="text-center">Resultados</h3>
                                  </div>
                                  <div>
                                  	<table class="table table-hover display">
                                  	  <thead>
									    <tr>
									      <th scope="col">Modulo</th>
									      <th scope="col">Año</th>
									      <th scope="col">Puntaje</th>
									      <!--th scope="col"></th-->
									    </tr>
									  </thead>
									  <tbody>
                                  	@foreach ( $history as $puntaje )
								  		<tr>  
									      <td>{{ $puntaje->modulo->nombreCompe }}</td>
									      <td>{{ $puntaje->año }}</td>
									      <td>{{ $puntaje->puntaje }}</td>
									    </tr>
								  	@endforeach
								  	  </tbody>
								  	</table>
                                  </div>
                                  <hr>
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
	</script>

@endsection
