@extends('layouts.app')

@section('content')
<div class="main main-raised">
		<div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-xs-6 col-xs-offset-3">
	           <div class="profile">
                  <div class="avatar">
                      <img src="assets/img/christian.png" alt="Circle Image" class="img-circle img-responsive img-raised">
                  </div>
                  <div class="name">
                    <h3 class="title">{!!$user->name!!}</h3>

    								<!-- <a href="#pablo" class="btn btn-just-icon btn-simple btn-dribbble"><i class="fa fa-dribbble"></i></a>
                    <a href="#pablo" class="btn btn-just-icon btn-simple btn-twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#pablo" class="btn btn-just-icon btn-simple btn-pinterest"><i class="fa fa-pinterest"></i></a> -->
                  </div>
              </div>
              <div class="description text-center">
									<h6>{!!$user->email!!}</h6>
                  <p>Puedes ver tus entradas Compradas/Reserva.</p>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-xs-offset-3">
              <h1 class="title text-center">Entradas</h1>
          </div>
        </div>
        <div id="reservas" class="row">
          <h3 class="title text-left">Tigo Money</h3>
					@foreach($transactions_user as $transaction)
						@if($transaction->payment_type == 'tigo_money')
							<div class="col-md-4">
		            <div class="card card-blog">
									<div class="card-image">
										<a href="#">
											<img class="img" src="assets/img/blog8.jpg">
										</a>
									<div class="ripple-container"></div></div>
									<div class="content">
										<h6 class="category text-success">
											<i class="material-icons">confirmation_number</i>Entrada compradas - Tigo Money
										</h6>
										<!-- <h4 class="card-title">
											<a href="#">

		                  </a>
										</h4> -->
		                <div class="card-content">
		                  <ul class="nav">
												@foreach(explode('[', $transaction->transaction_assistants) as $info)
													@if(!$info == null)
														<li>
															<p>{{str_limit($info,strlen($info)-1)}}<a href="#">Codigo QR</a></p>
														</li>
													@endif
												 @endforeach
		                  </ul>
		                </div>
										<div class="footer">
		                    <div class="author">
		                        <a href="#">
		                           <span>{{$transaction->sector_quantity}} Entradas</span>
		                        </a>
		                    </div>
		                   <div class="stats">
		                       <i class="material-icons">schedule</i>
		                      	{{$transaction->transaction_sector}}
		                    </div>
		                </div>
									</div>
								</div>
		          </div>
						@endif
					@endforeach
        </div>
        <div class="row">
          <h3 class="title text-left">Multipago Reservas</h3>
          <div class="col-md-4">
            <div class="card card-blog">
							<div class="card-image">
								<a href="#">
									<img class="img" src="assets/img/blog8.jpg">
								</a>
							<div class="ripple-container"></div></div>
							<div class="content">
								<h6 class="category text-info">
									<i class="material-icons">confirmation_number</i>Entrada reservada - Multipago
								</h6>
								<h4 class="card-title">
									<a href="#">
                    Aceptada <i class="text-success material-icons">done</i>
                  </a>
								</h4>
								<div class="footer">
                    <div class="author">
                        <a href="#">
                           <span>5 Entradas</span>
                        </a>
                    </div>
                   <div class="stats">
                       <i class="material-icons">schedule</i>
                      Sector Crecer
                    </div>
                </div>
							</div>
						</div>
          </div>
          <div class="col-md-4">
            <div class="card card-blog">
							<div class="card-image">
								<a href="#">
									<img class="img" src="assets/img/blog8.jpg">
								</a>
							<div class="ripple-container"></div></div>
							<div class="content">
								<h6 class="category text-danger">
									<i class="material-icons">confirmation_number</i>Entrada reservada - Multipago
								</h6>
								<h4 class="card-title">
									<a href="#">
                    Eliminada <i class="text-danger material-icons">clear</i>
                  </a>
								</h4>
								<div class="footer">
                    <div class="author">
                        <a href="#">
                           <span>5 Entradas</span>
                        </a>
                    </div>
                   <div class="stats">
                       <i class="material-icons">schedule</i>
                      Sector Crecer
                    </div>
                </div>
							</div>
						</div>
          </div>
          <div class="col-md-4">
            <div class="card card-blog">
							<div class="card-image">
								<a href="#">
									<img class="img" src="assets/img/blog8.jpg">
								</a>
							<div class="ripple-container"></div></div>
							<div class="content">
								<h6 class="category text-warning">
									<i class="material-icons">confirmation_number</i>Entrada reservada - Multipago
								</h6>
								<h4 class="card-title">
									<a href="#">
                    Pendiente <span>15:00</span> <i class="text-warning material-icons">schedule</i>
                  </a>
								</h4>
								<div class="footer">
                    <div class="author">
                        <a href="#">
                           <span>5 Entradas</span>
                        </a>
                    </div>
                   <div class="stats">
                       <i class="material-icons">schedule</i>
                      Sector Crecer
                    </div>
                </div>
							</div>
						</div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
