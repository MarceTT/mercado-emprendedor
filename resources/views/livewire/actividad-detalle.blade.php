<div>
    <section class="paddingTop-50 paddingBottom-100 bg-light-v2">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 mt-5">
                @foreach($actividades as $actividad)
             <div class="card align-items-start shadow-v1 p-5">
               <ul class="list-inline text-gray">
                 <li class="list-inline-item mr-3" style="color: #E0004D">
                    <i class="fa fa-calendar-o" aria-hidden="true"></i> @php(\Jenssegers\Date\Date::setLocale('es')){{ \Jenssegers\Date\Date::create($actividad->fecha)->format("l") }}
                 </li>
                 <li class="list-inline-item mr-3" style="color: #E0004D">
                   <i class="ti-time mr-1"></i>
                   {{ Carbon\Carbon::create($actividad->hora_inicio)->format('g:i A') }} - {{ Carbon\Carbon::create($actividad->hora_termino)->format('g:i A') }}
                 </li>
                 <!--<li class="list-inline-item mr-3" style="color: #E0004D"> 
                   <i class="ti-location-pin mr-1"></i>
                   Room:102, block: A, New auditorium building
                 </li>-->
               </ul>
               <h4 class="mb-4">
                 {{ $actividad->nombre }}
               </h4>
               <p>
                 {!! $actividad->detalle_actividad !!}
               </p>
               <a href="{{ url('/actividades') }}" class="btn btn-primary mt-4">Volver</a>
             </div>
             @endforeach
            </div> 
          </div> <!-- END row-->
        </div> <!-- END container-->
      </section> 
</div>
