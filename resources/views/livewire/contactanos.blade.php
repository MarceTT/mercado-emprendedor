<div>
    <section class="padding-y-50">
        <div class="container">
          <div class="row">
           <div class="col-12 text-center">
              <h2>
                ¡CONTÁCTANOS!
              </h2>
              <p>
                Déjanos tus datos de contacto y te contactaremos a la brevedad.
              </p>
              <div class="width-4rem height-4 bg-primary my-2 mx-auto rounded"></div>
            </div>
            <div class="col-lg-12 mx-auto mt-5">
              <div class="card text-center shadow-v3 p-5">                
                <p>
                  Campos Obligatorios <small style="color:red;">*</small>
                </p>
                @if(session()->has('success'))
                <div class="alert bg-success text-white px-4 py-3 alert-dismissible fade show" role="alert">
                  <strong> {{ session('success') }}</strong>
                  <button type="button" class="close font-size-14 absolute-center-y" data-dismiss="alert">
                    <i class="ti-close"></i>
                  </button>
                </div>
                @endif
                <form class="mt-4" wire:submit.prevent="contactar">
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label class="pull-left">Nombre <small style="color:red;"> *</small></label>
                      <input type="text" class="form-control @error('nombre') is-invalid  @enderror" wire:model="nombre">
                      @error('nombre') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="pull-left">Apellido Paterno<small style="color:red;"> *</small></label>
                        <input type="text" class="form-control @error('paterno') is-invalid  @enderror"  wire:model="paterno">
                        @error('paterno') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="pull-left">Apellido Materno<small style="color:red;"> *</small></label>
                        <input type="text" class="form-control @error('materno') is-invalid  @enderror"  wire:model="materno">
                        @error('materno') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label class="pull-left">Teléfono <small style="color:red;"> *</small></label>
                    <input type="text" class="form-control @error('telefono') is-invalid  @enderror" wire:model="telefono" maxlength="9">
                    @error('telefono') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
                  </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="pull-left">Dirección de e-mail <small style="color:red;"> *</small></label>
                      <input type="email" class="form-control @error('correo') is-invalid  @enderror" wire:model="correo">
                      @error('correo') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="pull-left">Confirmar dirección de e-mail <small style="color:red;"> *</small></label>
                      <input type="email" class="form-control @error('correo2') is-invalid  @enderror" wire:model="correo2">
                      @error('correo2') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="pull-left">Motivo de consulta <small style="color:red;"> *</small></label>
                        <textarea class="form-control @error('comentario') is-invalid  @enderror" rows="3" wire:model="comentario"></textarea>
                        @error('comentario') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8"><button type="submit" class="btn btn-primary btn-block">Ingresar Datos</button>
                    <div class="padding-y-50" wire:loading ><h3><strong>Insertando.... <i class="fa fa-refresh fa-spin"></i></strong></h3></div></div>
                  <div class="col-md-2"></div>
                </div>
                </form>
            </div>
          </div>
        </div> <!-- END row-->
      </div> <!-- END container-->
    </section>
</div>
