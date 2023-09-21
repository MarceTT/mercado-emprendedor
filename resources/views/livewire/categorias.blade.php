<div>
  <style>
    .links:hover{
      cursor:pointer;
      color: #E0004D;
    }

    .links:active{
      color: #E0004D;
    }
    .activo{
      color: #E0004D;
    }
    </style>
<section class="padding-y-10">
    <div class="container">
      <div class="row">
    <div class="col-12 text-center">
        <h2>
          Categorías
        </h2>
        <div class="width-4rem height-4 bg-primary my-2 mx-auto rounded"></div>
      </div>
      @if($categorias->count() > 0)
      @foreach($categorias as $categoria)
    <div class="col-lg-3 col-md-6 marginTop-30 wow fadeInUp" data-wow-delay=".1s">
        <div class="card height-100p text-center text-white p-4 p-md-5 bg-cover" data-dark-overlay="6" style="background:url({{'/'.$categoria->imagen}}) no-repeat">
           <h5 class="my-4">
             {{ $categoria->nombre }}
           </h5>
           <p class="text-white-0_8">
            <a href="{{ url('/emprendedores/'.Crypt::encrypt($categoria->id).'') }}" class="links">{!! $categoria->descripcion !!}</a>
           </p>
        </div>
       </div>
       @endforeach
       @else
      <div class="container padding-y-80">
        <div class="row justify-content-center">
      <div class="alert bg-danger text-white px-4 py-3 " role="alert">
        <i class="mr-2 ti-alert font-size-20"></i> <strong> No hay categorías</strong>
      </div>
        </div>
      </div>
      @endif
      </div>
    </div>
</section>
<section class="padding-y-80 border-bottom border-light">
    <div class="container">
      <div class="row pagination justify-content-center">
        {{ $categorias->links() }}
      </div> <!-- END row-->
    </div> <!-- END container-->
  </section>
</div>
