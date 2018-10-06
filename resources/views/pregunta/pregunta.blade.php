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
                                      <!--div class="form-group text-center">
                                          <ul class="list-inline">
                                              <li class="list-inline-item"><i class="text-muted fa fa-cc-visa fa-2x"></i></li>
                                              <li class="list-inline-item"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                                              <li class="list-inline-item"><i class="fa fa-cc-amex fa-2x"></i></li>
                                              <li class="list-inline-item"><i class="fa fa-cc-discover fa-2x"></i></li>
                                          </ul>
                                      </div-->
                                      <div class="col-md-12 form-group">
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
			                          <div class="col-md-12 form-group">
										<div class="col-md-1">
				                        	<label for="select" class="control-label">Enunciado</label>
				                         </div>
			                          	<div class="col-12 col-md-10">
			                          		<textarea class="ckeditor" name="editor1" id="editor1" rows="10" cols="80">
                                				Este es el textarea que es modificado por la clase ckeditor
                            				</textarea>
                            			</div>
			                          </div>

			                          <br>
			                          <br>
                                  	  <hr>
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
				año : 'Seleccione..',
				
			},
			methods:{
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
				}
			},
		});

		//CKEDITOR.replace( '#editor1' );
		var $editor;
		ClassicEditor
	    	.create( document.querySelector( '#editor1' ),{
	    		ckfinder: { 
		            uploadUrl:'{{ URL::asset("vendor/ckeditor5-build-classic/php/upload.php?command=QuickUpload&type=Files&responseType=json") }}'
		        }
	    	})
		    .then( editor => {
		        console.log( editor );
		        $editor = editor;
		        $editor.setData('<p>Lorem imsupt lorem,</p>');
		    } )
		    .catch( error => {
		        console.error( error );
		    } );
		//ClassicEditor
		//	.create( document.querySelector( '#editor1' ), {
		//	})
		//	.then( editor => {
		//		$editor = editor;
		//		handleStatusChanges( editor );
		//		handleSaveButton( editor );
		//		handleBeforeunload( editor );
		//	})
		//	.catch( err => {
		//		console.error( err.stack );
		//	});
	</script>

@endsection
