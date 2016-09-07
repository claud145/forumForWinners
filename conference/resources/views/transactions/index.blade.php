@extends('layouts.app')

@section('content')
  {!!Form::open(['route'=>'transaction.store','method'=>'POST','id'=>'form-transaction'])!!}
  <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
  {!!Form::hidden('user_id', Auth::user()->id, array('id' => 'user_id'))!!}
  <div class="main main-raised">
    <div class="container">
      <div id="datos-sector" class="section section-text">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">

            <div class="card card-nav-tabs card-plain">
            	<div class="header header-success">
            		<!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
            		<div class="nav-tabs-navigation">
            			<div class="nav-tabs-wrapper">
            				<ul id="mytabs" class="nav nav-tabs" data-tabs="tabs">
            					<li id="item_home" class="active"><a>Paso 1 --></a></li>
            					<li id="item_updates" class=""><a></a></li>
            					<li id="item_history" class=""><a></a></li>
            				</ul>
            			</div>
            		</div>
            	</div>
            	<div class="content">
            		<div class="tab-content">
            			<div class="tab-pane active" id="home">
                    <h3 class="title">Precios y sectores</h3><p class="tim-typo text-success">Seleccione el sector y cantidad de entradas</p>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            @foreach($sectorsDetail as $sector)
                              {!!Form::hidden($sector->price,$sector->id, array('id' => $sector->id))!!}
                            @endforeach
                            <label>Elija su sector</label>
                              {!! Form::select('sectors', $sectors, null, ['id' => 'sectors_select','class' => 'form-control']) !!}
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Eija la cantidad</label>
                              {!!Form::select('quantity', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'], null, ['id' => 'sectors_quantity','class'=>'form-control'])!!}
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <a id="tabNext" href="#" class="btn btn-success">Siguiente</a>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="section cd-section section-notifications">
                            <div class="alert alert-warning">
                    					 <div class="alert-icon">
                    						<i class="material-icons">warning</i>
                    					</div>
                    					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    						<span aria-hidden="true"><i class="material-icons">clear</i></span>
                    					</button>
              	                 <b>OJO</b> Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original.
                  	        </div>
                          </div>
                        </div>
                      </div>
            			</div>
            			<div class="tab-pane" id="updates">
                    <h3 class="title">Ingrese el Nombre Completo de los <span id="total_user">1</span> asistentes</h3>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="input-group">
            								<span class="input-group-addon">
            									<i class="material-icons">playlist_add</i>
            								</span>
            								<div class="form-group is-empty">
                              <input id="userName" type="text" class="form-control" placeholder="Agregar Nombre Completo">
                              <span class="material-input"></span>
                            </div>
                            <a href="#datos-sector" class="btn btn-success btn-simple" id="addUsers">Agregar</a>
                          </div>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                         <ul id="list-users" class="nav">
                           {!!Form::hidden('assistants', null, array('id' => 'assistants'))!!}
                        </ul>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <a id="tabNameNext" href="#datos-sector" class="btn btn-success">Siguiente</a>
                        <a href="#datos-sector" class="btn btn-danger btn-reload">Cancelar</a>
                      </div>
                    </div>
            			</div>
            			<div class="tab-pane" id="history">
                    <h3 class="title">Seleccione el Metodo de Pago. Ultimo paso.</h3>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Tipo de pago</label>
                          <div class="radio">
                            <label>
                              <input id="multipago" type="radio" value="multipagos"  data-dismiss="modal" data-toggle="modal" data-target="#modal_multipago"  name="optionsRadios">
                                Multipago
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input id="tigomoney" type="radio" value="tigomoney" data-dismiss="modal" data-toggle="modal" data-target="#modal_tigomoney" name="optionsRadios">
                                Tigo Money <small></small>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <a href="#datos-sector" class="btn btn-danger btn-reload">Cancelar</a>
                      </div>
                    </div>
            			</div>
            		</div>
            	</div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- MODAL MULTIPAGO  --}}
    <div class="modal fade" id="modal_multipago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              <i class="material-icons">clear</i>
            </button>
            <h4 class="modal-title">Reserva Multipago</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div id="contentMultipago" class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nombre:</label>
                      {!!Form::text('transaction_name_multipago',null,['id'=>'transaction_name_multipago','class'=>'form-control','placeholder'=>'Ingrese su Nombre Completo','disabled'])!!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Carnet de Identidad:</label>
                      {!!Form::number('transaction_nit_multipago',null,['id'=>'transaction_nit_multipago','class'=>'form-control','placeholder'=>'Ingrese su numero de Carnet de Identidad','disabled'])!!}
                    </div>
                  </div>
                </div>
              </div>
              <div id="detail" class="col-md-6">
                <h3>Detalle de reserva</h3>
                <div class="tim-typo">
                  <p>
                    <span id="sectors-detail">Sector:</span><br>
                    <span id="sector-quantity">Cantidad:</span> <br>
                    <span id="transaction-total">Total:</span> <br>
                    <span>Asistentes: </span> <br>
                   <b><span class="assistants_list"></span></b>
                  </p>
                </div>
                <div class="tim-typo">
                  <p><span class="tim-note">Correo:</span>
                  <strong>{{Auth::user()->email}}</strong><br>"Este es el correo donde se le enviara el codigo de reserva"</p>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            {!!link_to('#mytabs', $title = 'Siguiente ',$atributes = ['id'=>'registrarMultipago','class'=>'btn btn-success btn-simple'] )!!}
            <button type="button" class="btn btn-danger btn-simple btn-cancel" data-dismiss="modal">Cancelar<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 47.0781px; top: 11px; transform: scale(8.5); background-color: rgb(244, 67, 54);"></div></div></button>
          </div>
        </div>
      </div>
    </div>
    {{-- MODAL TIGOMONEY  --}}
    <div class="modal fade" id="modal_tigomoney" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              <i class="material-icons">clear</i>
            </button>
            <h4 class="modal-title">Comprar con Tigo Money</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div id="contentTigomoney" class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nombre:</label>
                      {!!Form::text('transaction_name_tigomoney',null,['id'=>'transaction_name_tigomoney','class'=>'form-control','placeholder'=>'Ingrese su Nombre Completo','disabled'])!!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nit:</label>
                      {!!Form::number('transaction_nit_tigomoney',null,['id'=>'transaction_nit_tigomoney','class'=>'form-control','placeholder'=>'Ingrese su numero de NIT','disabled'])!!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Telefono</label>
                      {!!Form::number('transaction_phone_tigomoney',null,['id'=>'transaction_phone_tigomoney','class'=>'form-control','placeholder'=>'Ingrese su numero de telefono (TIGO MONEY)','disabled'])!!}
                    </div>
                  </div>
                </div>
              </div>
              <div id="detail" class="col-md-6">
                <h3>Detalle de Compra</h3>
                <div class="tim-typo">
                  <p>
                    <span id="sector-quantity-tigo">Cantidad:</span> <br>
                    <span id="sectors-detail-tigo">Sector:</span><br>
                     <span id="transaction-total-tigo">Total:.</span> <br>
                     <span>Asistentes: </span> <br>
                    <b><span class="assistants_list"></span></b>
                  </p>
                </div>
                <div class="tim-typo">
                  <p><span class="tim-note">Correo:</span>
                  <strong>{{Auth::user()->email}}</strong><br>"Este es el correo donde se le enviara el codigo de compra"</p>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            {!!link_to('#mytabs', $title = 'Siguiente ',$atributes = ['id'=>'registrarTigo','class'=>'btn btn-success btn-simple'] )!!}
            {{-- <button type="submit" class="btn btn-success btn-simple">Siguiente</button> --}}
            <button type="button" class="btn btn-danger btn-simple btn-cancel" data-dismiss="modal">Cancelar<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 47.0781px; top: 11px; transform: scale(8.5); background-color: rgb(244, 67, 54);"></div></div></button>
          </div>
        </div>
      </div>
    </div>
    <!-- small modal -->
    <div class="modal fade" id="loading" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-small ">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            <h2 class="title text-center">Cargando</h2>
          </div>
          <div class="modal-body text-center">
            <h5><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
              <span class="sr-only">Loading...</span>
            </h5>
          </div>
          <div class="modal-footer text-center">
            {{-- <button type="button" class="btn btn-simple" data-dismiss="modal">Never mind</button>
            <button type="button" class="btn btn-success btn-simple">Yes</button> --}}
          </div>
        </div>
      </div>
    </div>
    <!--    end small modal -->
    <!-- small modal -->
    <div class="modal fade" id="congratulation" tabindex="-1" role="dialog" data-backdrop="static"  aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-small ">
         <div class="card">
						<div class="content content-success">
							<h5 class="category-social">
								<i class="fa fa-newspaper-o"></i> Forum For Winners
							</h5>
							<h4 class="card-title">
								<a href="#pablo">"Felicidades {!!Auth::user()->name!!} tu <span id="typeSale"></span> fue realizada"</a>
							</h4>
							<p class="card-description">
                <strong><span id="sectors-detail-congratulation">Sector: Crecer - 450Bs. Unidad</span><br></strong>
                <strong><span id="sector-quantity-congratulation">Cantidad: 4 Entradas</span> <br></strong>
                <strong><span id="transaction-total-congratulation">Total: 1800Bs.</span> <br></strong>
                <p>
                  Revisa tu correo {!!Auth::user()->email!!}
                </p>
              </p>
							<div class="footer text-center">
                  {!!link_to('/user#reservas', $title = 'Volver Inicio', $attributes = array('class'=>'btn btn-white btn-round'))!!}
              </div>
						</div>
					</div>
       </div>
    </div>
    <!--    end small modal -->
    <!-- small modal -->
    <div class="modal fade" id="error" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-small ">
        <div class="modal-content">
          <div class="modal-header">
             <h2 class="title text-center">Error</h2>
          </div>
          <div class="modal-body text-center">
            <h5>
              <div class="alert-icon">
    						<i class="material-icons">error_outline</i>
    					</div>
              <span id="error_coment" class=""></span>
            </h5>
          </div>
          <div class="modal-footer text-center">
            {{-- <button type="button" class="btn btn-simple" data-dismiss="modal">Never mind</button>
            <button type="button" class="btn btn-success btn-simple">Yes</button> --}}
            <a href="#datos-sector" class="btn btn-danger btn-reload">Atras</a>
          </div>
        </div>
      </div>
    </div>
    <!--    end small modal -->
    {!!Form::close()!!}
 @endsection
