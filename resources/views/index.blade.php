@extends('layouts.app')
@section('content')
<!--<div class="padding-y-60 bg-cover" data-dark-overlay="6" style="background:url(/template/assets/img/Banner_principal.jpg) no-repeat; background-size: 100% 100%;">
  <div class="container">
    <h1 class="display-md-5 font-weight-bold text-white wow slideInUp text-center">
      Postgrados y Formación Continua <br> Universidad Pedro de Valdivia<br><br>
      <a href="#cursos" class="btn btn-primary btn-lg mt-1 wow slideInUp float-center">Ver más</a>
    </h1>
    
  </div>
</div>-->


<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel" style="width: 100%" >
  <ol class="carousel-indicators">
    @foreach($banners as $carousel)
    <li data-target="#myCarousel" data-slide-to="0" class="@if($loop->index==0)active @endif"></li>
    @endforeach
  </ol>
  <div class="carousel-inner">
    @foreach($banners as $banner)
    <div class="carousel-item @if($loop->index==0)active @endif">
      <a href="#cursos"><img src="{{'/'.$banner->imagen}}" class="img-fluid" alt="cursos" style="width:100%;height:60%;"></a>
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<section class="padding-y-10">
  <div class="container">
    <div class="row">
     <div class="col-12 text-center">
        <h2>
          Asegura el éxito de tu emprendimiento
        </h2>
        <div class="width-4rem height-4 bg-primary my-2 mx-auto rounded"></div>
        <h4 class="text-primary">
          Difusión. Organización. Redes de apoyo
        </h4>
        <a href="{{ url('/contacto') }}" class="btn btn-primary">CONTÁCTANOS</a>
      </div>
      </div>
    </div> <!-- END row-->
  </div> <!-- END container-->
</section>
  
  
   




  @endsection
  @section('scripts')
  <script type="text/javascript">
    $(document).ready(function($){
    
    
    	$('.carousel').carousel({
		  interval: 3000
		});
		
  });
  </script>
  @endsection