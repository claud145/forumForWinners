@extends('layouts.app')

@section('content')
<div class="main main-raised">
  <div class="profile-content">
    <div class="container">
        <div class="row">
          <div class="col-xs-6 col-xs-offset-3">
           <div class="profile">
                <div class="avatar">
                    <img src="../assets/img/christian.jpg" alt="Circle Image" class="img-circle img-responsive img-raised">
                </div>
                <div class="name">
                    <h3 class="title">Christian Louboutin</h3>
	                  <h6>Designer</h6>
		                  <a href="#pablo" class="btn btn-just-icon btn-simple btn-dribbble"><i class="fa fa-dribbble"></i></a>
                      <a href="#pablo" class="btn btn-just-icon btn-simple btn-twitter"><i class="fa fa-twitter"></i></a>
                      <a href="#pablo" class="btn btn-just-icon btn-simple btn-pinterest"><i class="fa fa-pinterest"></i></a>
                </div>
            </div>
          </div>
          <div class="col-xs-2 follow">
           <button class="btn btn-fab btn-primary" rel="tooltip" title="Follow this user">
            <i class="material-icons">add</i>
          </button>
          </div>
        </div>
        <div class="description text-center">
            <p>An artist of considerable range, Chet Faker — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. </p>
        </div>
    </div>
</div>
</div>
@endsection
