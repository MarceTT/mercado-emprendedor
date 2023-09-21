<div>
  <style>
    .row-striped:nth-of-type(odd){
  background-color: #efefef;
  border-left: 4px #041E42 solid;
  border-color: #E0004D;
}

.row-striped:nth-of-type(even){
  background-color: #ffffff;
  border-left: 4px #efefef solid;
}

.row-striped {
    padding: 15px 0;
}
    </style>
    <section class="padding-y-10">
      <div class="container">
        <div class="row">
      <div class="col-12 text-center">
          <h2>
            Actividades
          </h2>
          <div class="width-4rem height-4 bg-primary my-2 mx-auto rounded"></div>
        </div>
        </div>
      </div>
  </section>
  <section class="paddingTop-50 paddingBottom-100 bg-light-v2">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 mt-1">
         
          <div class="container">
            @foreach($actividades as $actividad)
            <div class="row row-striped">
              <div class="col-2 text-right">
                <h1 class="display-4"><span class="badge badge-secondary">@php(\Jenssegers\Date\Date::setLocale('es')){{ \Jenssegers\Date\Date::create($actividad->fecha)->formatLocalized("%d") }}</span></h1>
                <h2>{{ ucfirst(\Jenssegers\Date\Date::parse($actividad->fecha)->format("F")) }}</h2>
              </div>
              <div class="col-10">
                <h3 class="text-uppercase" style="color: #041E42"><strong>{{ $actividad->nombre }}</strong></h3>
                <ul class="list-inline">
                    <li class="list-inline-item" style="color: #E0004D"><i class="fa fa-calendar-o" aria-hidden="true"></i> {{ \Jenssegers\Date\Date::create($actividad->fecha)->format("l") }}</li>
                  <li class="list-inline-item" style="color: #E0004D"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ Carbon\Carbon::create($actividad->hora_inicio)->format('g:i A') }} - {{ Carbon\Carbon::create($actividad->hora_termino)->format('g:i A') }}</li>
                </ul>
                <p style="color: #041E42">{!! substr($actividad->detalle_actividad,0,50) !!}...</p>
                <a href="{{ url('/actividades-detalle/'.Crypt::encrypt($actividad->id).'') }}" class="btn btn-outline-primary">Ver Más</a> 
              </div>
            </div>
            @endforeach
        
          </div>
          <!--<div class="text-center mt-5">
            <a href="#" class="btn btn-outline-primary btn-icon">
              <i class="ti-reload mr-2"></i>
              Load More
            </a>
          </div>-->
        </div> 
        
        <!--<div class="col-lg-5 mt-1">
          <div class="card shadow-v1">
            <div class="card-header border-bottom">
             <h4 class="mb-0">Category List</h4>
            </div>
            <div class="card-body">
              <ul class="list-unstyled">
                 <li class="mb-3"><a href="#">All Courses (80)</a></li>
                 <li class="mb-3"><a href="#">Web Development (28)</a></li>
                 <li class="mb-3"><a href="#">Mobile Apps (4)</a></li>
                 <li class="mb-3"><a href="#">Business (10)</a></li>
                 <li class="mb-3"><a href="#">IT &amp; Software (22)</a></li>
                 <li class="mb-3"><a href="#">Data Science (6)</a></li>
                 <li class="mb-3"><a href="#">Design (16) </a></li>
               </ul>
            </div>
          </div>
        </div>-->

      </div> <!-- END row-->
    </div> <!-- END container-->
    <br>
    <div class="container">
      <div class="row pagination justify-content-center">
        {{ $actividades->links() }}
      </div> <!-- END row-->
    </div> <!-- END container-->
  </section> 
</div>
