@extends('layouts.adminlayout')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Home</li>
  </ol>
</nav>
<p class="lead" style="color: #00BFB2;"> Accesos directos de la aplicación</p>
  <hr class="my-4">
  	<div class="card-deck">
      <div class="card border-success mb-3" style="max-width: 18rem;">
        <div class="card-header border-success mb-3" align="center" style="color: #00BFB2;"><i class="fa fa-book" style="font-size:36px"></i></div>
        <div class="card-body text-success">
          <h5 class="card-title" align="center">Banners</h5>
          <p class="card-text" align="center"><span class="badge badge-success">Total : </span></p>
          <a href="{{ url('/banner') }}" class="btn btn-success btn-lg btn-block">Banners</a>
        </div>
      </div>
      <div class="card border-success mb-3" style="max-width: 18rem;">
        <div class="card-header border-success mb-3" align="center" style="color: #00BFB2;"><i class="fa fa-book" style="font-size:36px"></i></div>
        <div class="card-body text-success">
          <h5 class="card-title" align="center">Categorías</h5>
          <p class="card-text" align="center"><span class="badge badge-success">Total : </span></p>
          <a href="{{ url('/categoria') }}" class="btn btn-success btn-lg btn-block">Categorías</a>
        </div>
      </div>
  <div class="card border-primary mb-3" style="max-width: 18rem;">
    <div class="card-header border-primary mb-3" align="center" style="color: #00BFB2;"><i class="fa fa-users" style="font-size:36px"></i></div>
    <div class="card-body text-primary">
      <h5 class="card-title" align="center">Emprendedores</h5>
      <p class="card-text" align="center"><span class="badge badge-primary">Total : </span></p>
      <a href="{{ url('/emprendedor') }}" class="btn btn-success btn-lg btn-block"> Emprendedores</a>
    </div>
</div>


@endsection