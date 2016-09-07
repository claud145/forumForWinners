@extends('layouts.app')

@section('content')
  <div id="content-sectors" class="main main-raised">
    <div class="pricing-3 section-image" style="background-image: url('assets/img/bg4.jpg')" id="pricing-3">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center">
            <h2 class="title">Sectores de la conferencia</h2>
            <h5 class="description">Sectores en preventa hasta agotar stock.</h5>
            <div class="section-space"></div>
          </div>
        </div>
        <div class="row">
          @foreach($sectorsEnable as $sector)
            @if($sector->state_promotion == 'enable')
              <div class="col-md-4">
                <div class="card card-pricing card-raised">
                  <div class="content content-blue">
                    <h6 class="category"><strong>{{$sector->name}}</strong> <br>{{$sector->type_sale}}</h6>
                    <br>
                    <h1 class="card-title"><small>Bs.</small>{{$sector->price}}<small>/00</small></h1>
                    <ul>
                      <br>
                      <p>Precio Normal
                        <del>{{$sector->price_before}}/00. Bs</del>
                      </p>
                      <br>
                    </ul>
                    @if (Auth::guest())
                      <a href="#" class="animated infinite bounce btn btn-white btn-round"  data-toggle="modal" data-target="#noticeModal">
                        Reserva
                      </a>
                    @else
                       {{link_to('/transaction#datos-sector', $title = 'Reserva', $attributes = array('class'=>'animated infinite bounce btn btn-white btn-round'))}}
                    @endif
                  </div>
                </div>
              </div>
            @else
              <div class="col-md-4 ">
                <div class="card card-pricing">
                  <div class="content">
                    <h6 class="category"><strong>{{$sector->name}}</strong> <br>{{$sector->type_sale}}</h6>
                    <br>
                    <h1 class="card-title"><small>Bs.</small>{{$sector->price}}<small>/00</small></h1>
                    <ul>
                      <br>
                      <p>Precio Normal
                        <del>{{$sector->price_before}}/00. Bs</del>
                      </p>
                      <br>
                    </ul>
                    @if (Auth::guest())
                      <a href="#" class="btn btn-blue btn-round"  data-toggle="modal" data-target="#noticeModal">
                        Reserva
                      </a>
                    @else
                      {{link_to('/transaction#datos-sector', $title = 'Reserva', $attributes = array('class'=>'btn btn-blue btn-round'))}}
                    @endif
                  </div>
                </div>
              </div>
            @endif
          @endforeach
          @foreach($sectorsDisabled as $sector)
            <div class="col-md-4">
              <div class="card card-pricing">
                <div class="content content-">
                  <div class="alert alert-danger alert-soldOut">
                    <h6 class="category"><strong>{{$sector->name}}</strong> <br>{{$sector->type_sale}} Agotada</h6>
                    <br>
                    <h1 class="card-title"><small>Bs.</small>{{$sector->price}}<small>/00</small></h1>
      	          </div>
        	        </div>
                  <ul>
                    <br>
                    <p>Precio Normal
                      <del>{{$sector->price_before}}/00. Bs</del>
                    </p>
                    <br>
                  </ul>
                  @if (Auth::guest())
                    <a href="#" disabled class="btn btn-blue btn-round">
                      Reserva
                    </a>
                  @else
                    <a href="#" disabled class="btn btn-blue btn-round">
                      Reserva
                    </a>
                  @endif
                </div>
              </div>
          @endforeach
        </div>

        </div>
      </div>
      <div class="container hidden">
        <div class="features-3">
          <div class="row">
            <div i class="col-md-6">
							<div class="phone-container">
								<img src="assets/img/pdf-icon.png" />
							</div>
						</div>
						<div class="col-md-6">
              <br /><br />
							<h2 class="title">Descarga Brochure/agenda</h2>
		        	<div class="info info-horizontal">
								<div class="icon icon-green">
									<i class="material-icons">extension</i>
								</div>
								<div class="description">
									<h4 class="info-title">Hundreds of Components</h4>
									<p>The moment you use Material Kit, you know you’ve never felt anything like it. With a single use, this powerfull UI Kit lets you do more than ever before. </p>
								</div>
		        	</div>
							<div class="info info-horizontal">
								<div class="icon icon-green">
									<i class="material-icons">child_friendly</i>
								</div>
								<div class="description">
									<h4 class="info-title">Easy to Use</h4>
									<p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
								</div>
							</div>
							<div class="info info-horizontal">
								<div class="description">
									<a href="{{url('/downloadBrochure')}}" class="btn btn-green btn-raised btn-lg">
									<i class="fa fa-ticket"></i> Descargar
									</a>
								</div>
							</div>
						</div>
					</div>
	    	</div>
			</div>
			<div class="page-header header-filter" style="background-image: url('assets/img/bg3.jpg');">
	    	<div class="container">
	      	<div class="row">
						<div class="col-md-6">
							<h1 class="title">Forum For Winners</h1>
	            <p class="tim-note">Estará compuesto de dos momentos muy importantes. El primero, será lo que hemos
                  denominado EL CONVERSATORIO DE LA EXCELENCIA, donde las personas
                  asistentes al evento, tendrán la oportunidad de escuchar a seis de los más exitosos
                  empresarios de nuestro país en una faceta de Speakers, compartiendo sus estrategias de
                  éxito. En el segundo momento de la tarde, tendremos como invitado a ISMAEL CALA
                  con su conferencia “CREER, CREAR Y CRECER” diseñada para motivar el camino
                  de la autorrealización personal, analizando el poder de las creencias en un ambiente de
                  imaginación y creatividad; necesarios en cualquier emprendimiento exitoso.
              </p>
	            <br />
						</div>
	          <div class="section-video col-md-5 col-md-offset-1">
	          	<div class="iframe-container">
	                <iframe src="https://www.youtube.com/embed/smioBdQwvBY?modestbranding=1&autohide=1&showinfo=0" frameborder="0" allowfullscreen height="250"></iframe>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
			<div id="section-wipes">
  			<div class="visible-xs col-md-8 col-md-offset-2 text-center title-speakers">
  				<h1 class="title">Speaker invitado</h1>
  			</div>
				<div id="speaker-one" class="animated page-header header-filter"  style="background-image: url('assets/img/bg1.jpg');">
					<div class="hidden-xs col-md-8 col-md-offset-2 text-center title-speakers">
						<h1 class="title">Speaker invitado</h1>
					</div>
            <div class="container">
              <div class="row">
                <div class="col-md-5 col-md-offset-1">
                    <div class="speaker-img">
  											<img id="speaker-one-img" src="assets/img/cala.jpg" class="img-rounded img-responsive" alt="" />
                    </div>
                </div>
                <div class="col-md-6">
  								<h1 class="title">Ismael Cala<small> Periodista, escritor, productor y presentador de radio y televisión</small></h1>
                    <h4>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus felis sem, tempus et rhoncus at, iaculis vitae lectus.
                      Nunc aliquam faucibus pharetra. Nam pellentesque molestie semper. Nulla nec diam euismod, cursus libero vel turpis duis.
                    </h4>
  							</div>
              </div>
            </div>
        </div>
        <div class="hidden">
          <div id="speaker-two" class="page-header header-filter" style="background-image: url('assets/img/bg3.jpeg');">
  						<div class="container">
    						<div class="row">
    							<div class="col-md-5 col-md-offset-1">
    								<div class="speaker-img">
    											<img src="assets/img/speaker_PabloGuardia_TIGO.jpg" class="img-rounded img-responsive" alt="" />
    									</div>
    							</div>
    							<div class="col-md-6">
    								<h1 class="title">Pablo Guardia<small> CEO Tigo Bolivia</small></h1>
    									<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus felis sem, tempus et rhoncus at, iaculis vitae lectus. Nunc aliquam faucibus pharetra. Nam pellentesque molestie semper. Nulla nec diam euismod, cursus libero vel turpis duis.</h4>
    							</div>
    						</div>
  						</div>
  				</div>
          <div id="speaker-three" class="page-header header-filter"  style="background-image: url('assets/img/bg2.jpeg');">
              <div class="container">
                <div class="row">
  								<div class="col-md-6">
  									<h1 class="title">Mario Anglaril <small>Presidente & CEO Grupo Avícola Sofía</small></h1>
                      <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus felis sem, tempus et rhoncus at, iaculis vitae lectus. Nunc aliquam faucibus pharetra. Nam pellentesque molestie semper. Nulla nec diam euismod, cursus libero vel turpis duis.</h4>
  								</div>
                  <div class="col-md-5 col-md-offset-1">
  									<div class="speaker-img">
  												<img src="assets/img/speaker_marioanglarill_Sofia.jpeg" class="img-rounded img-responsive" alt="" />
                      </div>
                  </div>
                </div>
              </div>
          </div>
  				<div id="speaker-four" class="page-header header-filter" style="background-image: url('assets/img/bg3.jpeg');">
  						<div class="container">
  							<div class="row">
  								<div class="col-md-5 col-md-offset-1">
  									<div class="speaker-img">
  												<img src="assets/img/speaker_pablovallejos_ ingenioaguai.jpg" class="img-rounded img-responsive" alt="" />
  										</div>
  								</div>
  								<div class="col-md-6">
  									<h1 class="title">Pablo Vallejos <small>CEO Ingenio Aguaí</small></h1>
  										<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus felis sem, tempus et rhoncus at, iaculis vitae lectus. Nunc aliquam faucibus pharetra. Nam pellentesque molestie semper. Nulla nec diam euismod, cursus libero vel turpis duis.</h4>
  								</div>
  							</div>
  						</div>
  				</div>
  				<div id="speaker-five" class="page-header header-filter"  style="background-image: url('assets/img/bg2.jpeg');">
              <div class="container">
                <div class="row">
  								<div class="col-md-6">
  									<h1 class="title">Ximena Ximenez	<small>Fundador Ximena Ximenez</small></h1>
                      <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus felis sem, tempus et rhoncus at, iaculis vitae lectus. Nunc aliquam faucibus pharetra. Nam pellentesque molestie semper. Nulla nec diam euismod, cursus libero vel turpis duis.</h4>
  								</div>
                  <div class="col-md-5 col-md-offset-1">
                      <div class="speaker-img">
  												<img src="assets/img/speaker_XimenaJiménez.jpg" class="img-rounded img-responsive" alt="" />
                      </div>
                  </div>
                </div>
              </div>
          </div>
          <div id="speaker-six" class="page-header header-filter" style="background-image: url('assets/img/bg3.jpeg');">
  						<div class="container">
  							<div class="row">
  								<div class="col-md-5 col-md-offset-1">
  									<div class="speaker-img">
  												<img src="assets/img/speaker_XimenaJiménez.jpg" class="img-rounded img-responsive" alt="" />
  										</div>
  								</div>
  								<div class="col-md-6">
  									<h1 class="title">José Luis Camacho	<small>Presidente & CEO Grupo Nacional Vida</small></h1>
  										<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus felis sem, tempus et rhoncus at, iaculis vitae lectus. Nunc aliquam faucibus pharetra. Nam pellentesque molestie semper. Nulla nec diam euismod, cursus libero vel turpis duis.</h4>
  								</div>
  							</div>
  						</div>
  				</div>
  				<div id="speaker-seven" class="page-header header-filter"  style="background-image: url('assets/img/bg2.jpeg');">
  						<div class="container">
  							<div class="row">
  								<div class="col-md-6">
  									<h1 class="title">Daniel Aguilar	<small>CEO Pil Andina</small></h1>
  										<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus felis sem, tempus et rhoncus at, iaculis vitae lectus. Nunc aliquam faucibus pharetra. Nam pellentesque molestie semper. Nulla nec diam euismod, cursus libero vel turpis duis.</h4>
  								</div>
  								<div class="col-md-5 col-md-offset-1">
  										<div class="speaker-img">
  												<img src="assets/img/christian.jpg" class="img-rounded img-responsive" alt="" />
  										</div>
  								</div>
  							</div>
  						</div>
  				</div>
  				<div id="speaker-eight" class="page-header header-filter" style="background-image: url('assets/img/bg3.jpeg');">
  						<div class="container">
  							<div class="row">
  								<div class="col-md-5 col-md-offset-1">
  									<div class="speaker-img">
  												<img src="assets/img/christian.jpg" class="img-rounded img-responsive" alt="" />
  										</div>
  								</div>
  								<div class="col-md-6">
  									<h1 class="title">Marcos Nakada	<small>Fundador Mitsuba</small></h1>
  										<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus felis sem, tempus et rhoncus at, iaculis vitae lectus. Nunc aliquam faucibus pharetra. Nam pellentesque molestie semper. Nulla nec diam euismod, cursus libero vel turpis duis.</h4>
  								</div>
  							</div>
  						</div>
  				</div>
          <div id="speaker-nine" class="page-header header-filter"  style="background-image: url('assets/img/bg2.jpeg');">
  						<div class="container">
  							<div class="row">
  								<div class="col-md-6">
  									<h1 class="title">Ismael Cala <small>Conferencista internacional & Co-founder Cala Enterprises</small></h1>
  										<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus felis sem, tempus et rhoncus at, iaculis vitae lectus. Nunc aliquam faucibus pharetra. Nam pellentesque molestie semper. Nulla nec diam euismod, cursus libero vel turpis duis.</h4>
  								</div>
  								<div class="col-md-5 col-md-offset-1">
  										<div class="speaker-img">
  												<!-- <iframe src="https://www.youtube.com/embed/IN6QnLpVEPI?modestbranding=1&autohide=1&showinfo=0" frameborder="0" allowfullscreen height="250"></iframe> -->
  												<img src="assets/img/christian.jpg" class="img-rounded img-responsive" alt="" />
  										</div>
  								</div>
  							</div>
  						</div>
  				</div>
        </div>
      </div>
			<div class="auspiciadores hidden" id="teams">
					<div class="team-1" id="team-1">
						<div class="container">
							<div class="row">
								<div class="col-md-8 col-md-offset-2 text-center">
									<h2 class="title">Auspiciadores</h2>
									<h5 class="description">Los auspiciadores para el evento</h5>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="card card-profile card-plain">
										<div class="card-avatar">
											<a href="#pablo">
												<img class="img" src="assets/img/idea-icon.png" />
											</a>
										</div>
										<div class="content">
											<h4 class="card-title">EMPRESA A</h4>
											<h6 class="category text-muted">Empresa a</h6>
											<p class="card-description">
													It is a long established fact that a reader will be distracted by the readable content of a page
												</p>
											<div class="footer">
												<a href="#pablo" class="btn btn-just-icon btn-simple btn-twitter"><i class="fa fa-twitter"></i></a>
												<a href="#pablo" class="btn btn-just-icon btn-simple btn-facebook"><i class="fa fa-facebook-square"></i></a>
												<a href="#pablo" class="btn btn-just-icon btn-simple btn-google"><i class="fa fa-google"></i></a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="card card-profile card-plain">
										<div class="card-avatar">
											<a href="#pablo">
												<img class="img" src="assets/img/consult.png" />
											</a>
										</div>
										<div class="content">
											<h4 class="card-title">EMPRESA B</h4>
											<h6 class="category text-muted">Empresa b</h6>
											<p class="card-description">
													It is a long established fact that a reader will be distracted by the readable content of a page
												</p>
											<div class="footer">
												<a href="#pablo" class="btn btn-just-icon btn-simple btn-twitter"><i class="fa fa-twitter"></i></a>
												<a href="#pablo" class="btn btn-just-icon btn-simple btn-dribbble"><i class="fa fa-dribbble"></i></a>
												<a href="#pablo" class="btn btn-just-icon btn-simple btn-linkedin"><i class="fa fa-linkedin"></i></a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="card card-profile card-plain">
										<div class="card-avatar">
											<a href="#pablo">
												<img class="img" src="assets/img/shield-flat.png" />
											</a>
										</div>
										<div class="content">
											<h4 class="card-title">EMPRESA C</h4>
											<h6 class="category text-muted">Empresa c</h6>
											<p class="card-description">
													It is a long established fact that a reader will be distracted by the readable content of a page
												</p>
											<div class="footer">
												<a href="#pablo" class="btn btn-just-icon btn-simple btn-facebook"><i class="fa fa-facebook-square"></i></a>
												<a href="#pablo" class="btn btn-just-icon btn-simple btn-dribbble"><i class="fa fa-dribbble"></i></a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="card card-profile card-plain">
										<div class="card-avatar">
											<a href="#pablo">
												<img class="img" src="assets/img/bulb-curvy-flat.png" />
											</a>
										</div>
										<div class="content">
											<h4 class="card-title">EMPRESA D</h4>
											<h6 class="category text-muted">Empresa d</h6>
											<p class="card-description">
													It is a long established fact that a reader will be distracted by the readable content of a page
												</p>
											<div class="footer">
												<a href="#pablo" class="btn btn-just-icon btn-simple btn-facebook"><i class="fa fa-facebook-square"></i></a>
												<a href="#pablo" class="btn btn-just-icon btn-simple btn-dribbble"><i class="fa fa-dribbble"></i></a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3">
								 <div class="card card-profile card-plain">
									 <div class="card-avatar">
										 <a href="#pablo">
											 <img class="img" src="assets/img/idea-icon.png" />
										 </a>
									 </div>
									 <div class="content">
										 <h4 class="card-title">EMPRESA A</h4>
										 <h6 class="category text-muted">Empresa a</h6>
										 <p class="card-description">
												 It is a long established fact that a reader will be distracted by the readable content of a page
											 </p>
										 <div class="footer">
											 <a href="#pablo" class="btn btn-just-icon btn-simple btn-twitter"><i class="fa fa-twitter"></i></a>
											 <a href="#pablo" class="btn btn-just-icon btn-simple btn-facebook"><i class="fa fa-facebook-square"></i></a>
											 <a href="#pablo" class="btn btn-just-icon btn-simple btn-google"><i class="fa fa-google"></i></a>
										 </div>
									 </div>
								 </div>
							 </div>
							 <div class="col-md-3">
								 <div class="card card-profile card-plain">
									 <div class="card-avatar">
										 <a href="#pablo">
											 <img class="img" src="assets/img/consult.png" />
										 </a>
									 </div>
									 <div class="content">
										 <h4 class="card-title">EMPRESA B</h4>
										 <h6 class="category text-muted">Empresa b</h6>
										 <p class="card-description">
												 It is a long established fact that a reader will be distracted by the readable content of a page
											 </p>
										 <div class="footer">
											 <a href="#pablo" class="btn btn-just-icon btn-simple btn-twitter"><i class="fa fa-twitter"></i></a>
											 <a href="#pablo" class="btn btn-just-icon btn-simple btn-dribbble"><i class="fa fa-dribbble"></i></a>
											 <a href="#pablo" class="btn btn-just-icon btn-simple btn-linkedin"><i class="fa fa-linkedin"></i></a>
										 </div>
									 </div>
								 </div>
							 </div>
							 <div class="col-md-3">
								 <div class="card card-profile card-plain">
									 <div class="card-avatar">
										 <a href="#pablo">
											 <img class="img" src="assets/img/shield-flat.png" />
										 </a>
									 </div>
									 <div class="content">
										 <h4 class="card-title">EMPRESA C</h4>
										 <h6 class="category text-muted">Empresa c</h6>
										 <p class="card-description">
												 It is a long established fact that a reader will be distracted by the readable content of a page
											 </p>
										 <div class="footer">
											 <a href="#pablo" class="btn btn-just-icon btn-simple btn-facebook"><i class="fa fa-facebook-square"></i></a>
											 <a href="#pablo" class="btn btn-just-icon btn-simple btn-dribbble"><i class="fa fa-dribbble"></i></a>
										 </div>
									 </div>
								 </div>
							 </div>
							 <div class="col-md-3">
								 <div class="card card-profile card-plain">
									 <div class="card-avatar">
										 <a href="#pablo">
											 <img class="img" src="assets/img/bulb-curvy-flat.png" />
										 </a>
									 </div>
									 <div class="content">
										 <h4 class="card-title">EMPRESA D</h4>
										 <h6 class="category text-muted">Empresa d</h6>
										 <p class="card-description">
												 It is a long established fact that a reader will be distracted by the readable content of a page
											 </p>
										 <div class="footer">
											 <a href="#pablo" class="btn btn-just-icon btn-simple btn-facebook"><i class="fa fa-facebook-square"></i></a>
											 <a href="#pablo" class="btn btn-just-icon btn-simple btn-dribbble"><i class="fa fa-dribbble"></i></a>
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
