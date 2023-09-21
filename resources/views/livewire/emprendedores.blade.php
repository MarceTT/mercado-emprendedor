<div>
  <section class="padding-y-60 bg-light-v2">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          @foreach($categorias as $categoria)
          <h2>
            Emprendedores en la categoría : {{ $categoria->nombre }}
          </h2>
          @endforeach
          <div class="width-4rem height-4 bg-primary my-2 mx-auto rounded"></div>
        </div>
        @if($emprendedores->count() > 0)
        @foreach($emprendedores as $emprendedor)
      <div class="col-lg-4 col-md-6 marginTop-30">
        <div href="#" class="card height-100p text-gray shadow-v1">
          <a href="{{ url('/emprendedores-detalle/'.Crypt::encrypt($emprendedor->id).'') }}"><img class="card-img-top" src="{{'/'.$emprendedor->imagen}}" alt=""></a>
          <div class="card-body">
            <a href="{{ url('/emprendedores-detalle/'.Crypt::encrypt($emprendedor->id).'') }}" class="h5">
              {{ $emprendedor->nombre_proyecto }}
            </a>
            <p class="my-3">
              <i class="ti-write mr-2"></i>
              {!! $emprendedor->resumen !!}
            </p>
            
          </div>
          <div class="card-footer media align-items-center justify-content-between">
              <a href="{{ url('/emprendedores-detalle/'.Crypt::encrypt($emprendedor->id).'') }}" class="position-absolute btn btn-primary btn-sm left-20">
                  Ver Detalle
                </a>
          </div>
        </div>
      </div>
      @endforeach
      @else
      <div class="container padding-y-80">
        <div class="row justify-content-center">
      <div class="alert bg-danger text-white px-4 py-3 " role="alert">
        <i class="mr-2 ti-alert font-size-20"></i> <strong> No hay emprendedores en esta categoría</strong> <a href="{{ url('/categorias') }}"> Haz click aquí para volver.</a>
      </div>
        </div>
      </div>
      @endif
    </div>
  </div>
  </section>
</div>
