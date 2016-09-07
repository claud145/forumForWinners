<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="theme-color" content="#4caf50" />
  <title>Forum For Winners</title>
  <style>
#map {
     width: 100%;
     height: 200px;
  }
 </style>
  <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

  <!-- CSS Files -->
  {!!Html::style('assets/css/bootstrap.min.css')!!}
  {!!Html::style('assets/css/material-kit.css')!!}
  {!!Html::style('assets/css/animate.css')!!}
  {{-- {!!Html::script('assets/scrollmagic/uncompressed/ScrollMagic.js')!!}
  {!!Html::script('assets/scrollmagic/uncompressed/ScrollMagic.js')!!}
  {!!Html::script('assets/scrollmagic/uncompressed/plugins/debug.addIndicators.js')!!} --}}


    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body class="landing-page">
  <nav class="navbar navbar-default navbar-success navbar-fixed-top navbar-color-on-scroll" id="sectionsNav">
    <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
  	   <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
          		<span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            {!!link_to('/', $title = 'Forum For Winners', $attributes = ['class' => 'navbar-brand'], $secure = null)!!}
	    </div>
      <div class="collapse navbar-collapse" id="navigation-example">
	       <ul class="nav navbar-nav navbar-right">
            <li>
              {!!link_to('/', $title = 'Forum For Winners', $attributes = [], $secure = null)!!}
						</li>
						<li>
              {!!link_to('/#section-wipes', $title = 'Speakers')!!}
						</li>
						<li>
              {!!link_to('/#content-sectors', $title = 'Tickets')!!}
						</li>
						{{-- <li>
			          <a href="#">Blog</a>
						</li> --}}
						<li>
                {!!link_to('/#footer', $title = 'Contacto')!!}
						</li>
						{{-- <li>
              {!!link_to('/#teams', $title = "Sponsors")!!}
						</li> --}}
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li>
                  <a href="#" class="btn btn-blue" data-dismiss="modal" data-toggle="modal" data-target="#signup">Iniciar Sesion</a>
                </li>
                <li>
                  <a href="#" class="btn btn-green" data-dismiss="modal" data-toggle="modal" data-target="#register">Registrate</a>
                </li>
            @else
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    {{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-with-icons">
                    <li><a href="{{ url('/user') }}"><i class="fa fa-btn fa-ticket"></i> Mis Reservas</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Cerrar Sesion</a></li>
                  </ul>
                </li>
            @endif
      		</ul>
    	</div>
  	</div>
  </nav>
  <div class="page-header header-filter" data-parallax="active" style="background-image: url('assets/img/cala.jpg');">
    <div class="container">
      @if (!Auth::guest())
        <div class="alert alert-success">
          <div class="container-fluid">
             <div class="alert-icon">
              <i class="material-icons">warning</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
           <b>Bienvenido:</b>  {{ Auth::user()->name }}
         </div>
        </div>
      @endif
      @if ($errors->has('email')||$errors->has('password')||$errors->has('name'))
        <div class="alert alert-warning">
          <div class="container-fluid">
             <div class="alert-icon">
              <i class="material-icons">warning</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
           <b>Ups..!:</b>  {{ $errors->first('email') }} {{ $errors->first('password') }} {{ $errors->first('name') }}
         </div>
        </div>
      @endif
      <div class="row">
	       <div class="col-md-8">
  					<h1 class="title">Forum for Winners<small>by CEMTER presenta:</small></h1>
            <h4 class="cite"><q cite="">ISMAEL CALA con su gira de liderazgo “CREER, CREAR y CRECER”</q> </h4>
            <br />
            <a href="{{ url('/#content-sectors') }}" class="btn btn-success btn-raised btn-lg">
  					<i class="fa fa-ticket"></i> Reserva tu Ticket
  					</a>
  				</div>
        </div>
      </div>
  </div>
  @yield('content')
  <footer id="footer" class="footer footer-big">
    <div class="container">

      <div class="content">
        <div class="row">

          <div class="col-md-4">
            <a href="#pablo"><h5>"Forum For Winners, un producto de CEMTER"</h5></a>
            <p><i class="fa fa-building" aria-hidden="true"></i> CEMTER SRL</p>
            <p><i class="fa fa-home" aria-hidden="true"></i> Barrio Lazareto Calle Corumbá #214 Esq. Calle Portón</p>
            <p><i class="fa fa-phone" aria-hidden="true"></i> +591 (3) 342.9898</p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> info@cemter.com.bo</p>
            <p><i class="fa fa-globe" aria-hidden="true"></i> www.cemter.com.bo</p>
          </div>
          <div class="col-md-4">
            <h5>Direccion</h5>
            <div id="map"></div>
          </div>
          <div class="col-md-4">
            <h5>Menu</h5>
            <ul class="links-vertical">
              <li>
                {!!link_to('/', $title = 'Forum For Winners', $attributes = [], $secure = null)!!}
             </li>
             <li>
                {!!link_to('/#section-wipes', $title = 'Speakers')!!}
             </li>
             <li>
                {!!link_to('/#content-sectors', $title = 'Tickets')!!}
             </li>
             {{-- <li>
                 <a href="#">Blog</a>
             </li> --}}
             <li>
                {!!link_to('/#footer', $title = "Contacto")!!}
             </li>
             {{-- <li>
                {!!link_to('/#teams', $title = "Sponsors")!!}
             </li> --}}
            </ul>
          </div>
          <!--  <div class="col-md-3">
            <h5>Suscribete!</h5>
            <p>
              Unete con nosotros para que te enviemos las ultimas noticias.
            </p>
            <form class="form form-newsletter" method="" action="">

              <div class="form-group">
                <input type="email" class="form-control" placeholder="Your Email...">
              </div>

              <button type="button" class="btn btn-primary btn-just-icon" name="button">
                <i class="material-icons">mail</i>
              </button>

            </form>
          </div>   -->

        </div>
      </div>

      <hr />

      <ul class="social-buttons">
        <li>
          <a href="#pablo" class="btn btn-just-icon btn-simple btn-twitter">
            <i class="fa fa-twitter"></i>
          </a>
        </li>
        <li>
          <a href="#pablo" class="btn btn-just-icon btn-simple btn-facebook">
            <i class="fa fa-facebook-square"></i>
          </a>
        </li>
        <li>
          <a href="#pablo" class="btn btn-just-icon btn-simple btn-dribbble">
            <i class="fa fa-dribbble"></i>
          </a>
        </li>
        <li>
          <a href="#pablo" class="btn btn-just-icon btn-simple btn-google">
            <i class="fa fa-google-plus"></i>
          </a>
        </li>
        <li>
          <a href="#pablo" class="btn btn-just-icon btn-simple btn-youtube">
            <i class="fa fa-youtube-play"></i>
          </a>
        </li>
      </ul>

      <div class="copyright pull-center">
        Copyright &copy; <script>document.write(new Date().getFullYear())</script> Forum for Winners
      </div>
    </div>
  </footer>

            <!--     *********   END BIG WHITE FOOTER v2     *********      -->
			<!-- notice modal -->
<div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notice">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
        <h4 class="modal-title" id="myModalLabel">Necesitas registrarse para comprar</h4	>
      </div>
      <div class="modal-body">
        <div class="instruction">
          <div class="row text-center">
						<div class="col-md-6">
							<small>No tienes cuenta?</small>
							<a href="#" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#signup">Registrate</a>
						</div>
						<div class="col-md-6">
							<small>Ya tienes cuenta?</small>
              <a href="#" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#register">Iniciar Sesion</a>
						</div>
          </div>
        </div>
        <p>Si tienes preguntas puedes contactarnos a nuestras redes sociales o enviarnos un correo a abc@abc.com. Nosotros estaremos para ayudarte!</p>
      </div>
      <div class="modal-footer text-center">
      </div>
    </div>
  </div>
</div>
<!-- Modal Signup -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog row">
    <div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-2">
  		<div class="card card-signup">
        <form class="" role="form" method="POST" action="{{ url('/login') }}">
          {{ csrf_field() }}
  				<div class="header header-blue text-center">
  					<h4 class="card-title">Iniciar sesión</h4>
  				</div>
  				{{-- <p class="description text-center">Or Be Classical</p> --}}
  				<div class="content">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <div class="input-group">
    						<span class="input-group-addon">
    							<i class="material-icons">email</i>
    						</span>
                <input id="email" type="email" required class="form-control" placeholder="Correo Electronico..." name="email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <div class="input-group">
    						<span class="input-group-addon">
    							<i class="material-icons">lock_outline</i>
    						</span>
                <input id="password" type="password" required class="form-control" placeholder="Contraseña..." name="password">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
    					</div>
            </div>
  				</div>
  				<div class="footer text-center">
            <button type="submit" class="btn btn-primary btn-simple btn-wd btn-lg">
                <i class="fa fa-btn fa-sign-in"></i> Iniciar
            </button>
            <button type="button" class="btn btn-warning btn-simple btn-wd btn-lg" data-dismiss="modal" aria-hidden="true">Cancelar</button>
  				</div>
  			</form>
  		</div>
    </div>
  </div>
</div>
<!-- Modal Register -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog row">
    <div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-2">
  		<div class="card card-signup">
        <form class="" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
  				<div class="header header-green text-center">
  					<h4 class="card-title">Registro</h4>
  				</div>
  				{{-- <p class="description text-center">Or Be Classical</p> --}}
  				<div class="content">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <div class="input-group">
    						<span class="input-group-addon">
    							<i class="material-icons">face</i>
    						</span>
                <input id="name" type="text" class="form-control" placeholder="Nombre Completo..." name="name" value="{{ old('name') }}" required>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <div class="input-group">
    						<span class="input-group-addon">
    							<i class="material-icons">email</i>
    						</span>
                <input id="email" type="email" class="form-control" placeholder="Correo Electronico..." name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
    					</div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <div class="input-group">
    						<span class="input-group-addon">
    							<i class="material-icons">lock_outline</i>
    						</span>
                <input id="password" type="password" placeholder="Contraseña..." class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
    					</div>
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="material-icons">lock_outline</i>
                </span>
                <input id="password-confirm" type="password" placeholder="Confirmar Contraseña..." class="form-control" name="password_confirmation" required>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
              </div>
            </div>
  				</div>
  				<div class="footer text-center">
            <button type="submit" class="btn btn-primary btn-simple btn-wd btn-lg">
                <i class="fa fa-btn fa-user"></i> Registrar
            </button>
            <button type="button" class="btn btn-warning btn-simple btn-wd btn-lg" data-dismiss="modal" aria-hidden="true">Cancelar</button>
  				</div>
  			</form>
  		</div>
    </div>
  </div>
</div>

</body>

    <!-- JavaScripts -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> --}}
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

  	<!--   Core JS Files   -->
    {!!Html::script('assets/js/jquery.min.js')!!}
    {!!Html::script('assets/js/bootstrap.min.js')!!}
    {!!Html::script('assets/js/material.min.js')!!}
  	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    {!!Html::script('assets/js/nouislider.min.js')!!}
  	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    {!!Html::script('assets/js/bootstrap-datepicker.js')!!}
  	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    {!!Html::script('assets/js/material-kit.js')!!}

  	<script type="text/javascript">
  		$().ready(function(){

  			// the body of this function is in assets/material-kit.js
  			materialKit.initSliders();
              window_width = $(window).width();

              if (window_width >= 992){
                  big_image = $('.wrapper > .header');

  				$(window).on('scroll', materialKitDemo.checkScrollForParallax);
  			}
  		});
  	</script>
    <script>
     function initMap() {
       var mapDiv = document.getElementById('map');
       var myLatLng = {lat: -17.784246, lng: -63.161513};
       var map = new google.maps.Map(mapDiv, {
           center: {lat: -17.784246, lng: -63.161513},
           zoom: 18
       });

      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Hello World!'
      });
     }
   </script>
   <script async defer
       src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0zjaeAaFet-cX9Rcy0zlGM5hBBc1f5cE&callback=initMap">
   </script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56a14c01e3ab862a"></script>
</body>
</html>
