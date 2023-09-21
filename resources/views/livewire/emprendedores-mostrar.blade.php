<div>
    <section class="paddingBottom-100 padding-y-20">
        <div class="container">
          <div class="col-12 text-center">
            @foreach($detalles as $nombre)
            <h2>
              {{ $nombre->nombre_proyecto }}
            </h2>
            <div class="width-4rem height-4 bg-primary my-2 mx-auto rounded"></div>
           <a href="{{ url('/emprendedores/'.Crypt::encrypt($nombre->categoria_id).'') }}" >Volver</a>
           @endforeach
          </div>
        @foreach($detalles as $detalle)
         <div class="row">
            <aside class="col-lg-3">
                <div class="card border border-light marginTop-30 shadow-v1">
                  <h4 class="card-header border-bottom mb-0 h6"><i class="mr-2 ti-info font-size-20 btn-primary"></i> Nombre del Proyecto</h4>
                  <ul class="card-body list-unstyled mb-0">
                   <li class="mb-2">{{ $detalle->nombre_proyecto }}</li>
                   <li class="mb-2"><img src="{{ '/'.$detalle->logo }}" width="200" height="100"></li>
                  </ul>
                </div>
                <div class="card border border-light marginTop-30 shadow-v1">
                  <h4 class="card-header border-bottom mb-0 h6"><i class="mr-2 fa fa-users font-size-20 btn-success"></i> Equipo</h4>
                  <ul class="card-body list-unstyled mb-0">
                   <li class="mb-2">{!! $detalle->equipo !!}</li>
                  </ul>
                </div>
                <div class="card border border-light marginTop-30 shadow-v1">
                  <h4 class="card-header border-bottom mb-0 h6"><i class="mr-2 fa fa-send font-size-20 btn-warning"></i> Contacto</h4>
                  <ul class="card-body list-unstyled mb-0">
                   <li class="mb-2">{!! $detalle->contacto !!}</li>
                  </ul>
                </div>
                <div class="card marginTop-30 shadow-v1 hover:parent">
                 <img class="hover:zoomin" src="assets/img/262x230/9.jpg" alt="">
                 <div class="card-img-overlay text-white bg-black-0_6">
                   <h4 class="card-title">
                     Enriched Learning Experiences
                   </h4>
                   <p class="my-3">
                     Get unlimited access to 2,000 of Educati’s top courses for your team.
                   </p>
                   <a href="#" class="btn btn-white">Join Now</a>
                 </div>
                </div>
              </aside> <!-- END col-lg-3 --> 

            <div class="col-lg-9 marginTop-30">
              <div class="ec-video-container">
                @if(!empty($detalle->url_video))
                <iframe src="{{ $detalle->url_video }}"></iframe>
                @elseif(!empty($detalle->imagen_grande))
                <img src="{{ '/'.$detalle->imagen_grande }}" height="500px">
                @else
                <iframe src="{{ $detalle->url_video }}"></iframe>
                @endif
              </div>
              
              <div class="card padding-30 shadow-v3">
                <h4>
                  Resumen:
                </h4>
                <ul class="list-inline mb-0 mt-2">
                  <li class="list-inline-item my-2 pr-md-4">
                    <!--<i class="ti-headphone small text-primary"></i>-->
                    <p class="text-justify">{!! $detalle->resumen !!}</p>
                  </li>
                </ul>
              </div>
              
              <div class="col-12 mt-4">
            </div> <!-- END col-12 -->
            </div> <!-- END col-lg-9 -->
            
           
           
         </div> <!-- END row-->
         @endforeach
        </div> <!-- END container-->
      </section>
</div>
