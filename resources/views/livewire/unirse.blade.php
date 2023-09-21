<div>
    <section class="padding-y-50">
        <div class="container">
          <div class="row">
           <div class="col-12 text-center">
              <h2>
                Mercado Emprendedor UDALBA
              </h2>
              <p>
                Completa el siguiente formulario con toda la información de tu negocio, de esta forma validaremos cada uno de tus datos y te contactaremos para confirmar tu incorporación. Gracias por confiar en nosotros!
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
                <form class="mt-4" wire:submit.prevent="unirse">
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label class="pull-left">Nombre Completo <small style="color:red;"> *</small></label>
                      <input type="text" class="form-control @error('nombre') is-invalid  @enderror" wire:model="nombre">
                      @error('nombre') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="pull-left">Rut <small style="color:red;"> *</small></label>
                        <input type="text" class="form-control @error('rut') is-invalid  @enderror" wire:model="rut" maxlength="10" placeholder="(Ejemplo 12345678-2)">
                        @error('rut') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="pull-left">Carrera <small style="color:red;"> *</small></label>
                        <input type="text" class="form-control @error('carrera') is-invalid  @enderror" wire:model="carrera">
                        @error('carrera') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label class="pull-left">Sede<small style="color:red;"> *</small></label>
                      <select class="form-control @error('sede') is-invalid  @enderror" wire:model="sede">
                          <option value="">--Elija Sede--</option>
                          <option value="Antofagasta">Antofagasta</option>
                          <option value="Chillan">Chillán</option>
                          <option value="La Serena">La Serena</option>
                          <option value="Santiago">Santiago</option>
                      </select>
                      @error('sede') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
                  </div>
                    
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="pull-left">Nombre de tu Negocio <small style="color:red;"> *</small></label>
                    <input type="text" class="form-control @error('nombrenegocio') is-invalid  @enderror" wire:model="nombrenegocio">
                    @error('nombrenegocio') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
                </div>
                  <div class="form-group col-md-6">
                      <label class="pull-left">En qué ciudad se encuentra tu negocio <small style="color:red;"> *</small></label>
                    <input type="text" class="form-control @error('ciudadnegocio') is-invalid  @enderror" wire:model="ciudadnegocio">
                    @error('ciudadnegocio') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
                  </div>
              </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="pull-left">Selecciona el rubro de tu negocio <small style="color:red;"> *</small></label>
                        <select class="form-control @error('rubro') is-invalid  @enderror" wire:model="rubro">
                            <option value="">--Elija Rubro--</option>
                            <option value="Agricultura y Ganadería">Agricultura y Ganadería</option>
                            <option value="Automotriz">Automotriz</option>
                            <option value="Bienes de Consumo">Bienes de Consumo</option>
                            <option value="Construccion">Construcción</option>
                            <option value="Consultoría">Consultoría</option>
                            <option value="Educación">Educación</option>
                            <option value="Fabricación Industrial">Fabricación Industrial</option>
                            <option value="Farmacéutico y Salud">Farmacéutico y Salud</option>
                            <option value="Hotelería">Hotelería</option>
                            <option value="Inmobiliaria, Construcción e Ingeniería">Inmobiliaria, Construcción e Ingeniería</option>
                            <option value="Marketing, Publicidad y Diseño">Marketing, Publicidad y Diseño</option>
                            <option value="Minera, Energía y Recursos Naturales">Minera, Energía y Recursos Naturales</option>
                            <option value="Reclutamiento y Recursos Humanos">Reclutamiento y Recursos Humanos</option>
                            <option value="Retail">Retail</option>
                            <option value="Servicios Empresariales">Servicios Empresariales</option>
                            <option value="Servicios Financieros (Banca, Finanzas, Inversiones y Seguros)">Servicios Financieros (Banca, Finanzas, Inversiones y Seguros)</option>
                            <option value="Servicios Legales">Servicios Legales</option>
                            <option value="Servicios Técnicos">Servicios Técnicos</option>
                            <option value="Telecomunicaciones y Tecnologías de la Información">Telecomunicaciones y Tecnologías de la Información</option>
                            <option value="Transporte y Logistica">Transporte y Logistica</option>
                            <option value="Turismo, Restaurantes, Artística y Entretenimiento">Turismo, Restaurantes, Artística y Entretenimiento</option>
                            <option value="Otro">Otro</option>
                        </select>
                        @error('rubro') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
                    </div>
                    <div class="form-group col-md-6" wire:ignore>
                        <label class="pull-left">Indique los medios de pago aceptados por su negocio <small style="color:red;"> *</small></label>
                        <select class="hartos form-control @error('pagos') is-invalid  @enderror" multiple="multiple" wire:model="pagos">
                          <option value="">--Elija Opción--</option>
                          <option value="Efectivo">Efectivo</option>
                          <option value="Tarjetas">Tarjeta de Crédito y Tarjeta de Débito</option>
                          <option value="Credito">Tarjeta de Crédito</option>
                          <option value="Debito">Tarjeta de Débito</option>
                          <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                      </select>
                      @error('pagos') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
                    </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="pull-left">Indique si su negocio realiza despacho <small style="color:red;"> *</small></label>
                    <select class="form-control @error('despacho') is-invalid  @enderror" wire:model="despacho">
                      <option value="">--Elija Opción--</option>
                      <option value="Si">Si</option>
                      <option value="No">No</option>
                  </select>
                  @error('despacho') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
                </div>
                  <div class="form-group col-md-6">
                      <label class="pull-left">Si realiza despacho, indique las condiciones <small style="color:red;"> *</small></label>
                    <input type="text" class="form-control @error('condiciones') is-invalid  @enderror" wire:model="condiciones"  placeholder="(Ejemplo: Compras sobre $10.000)">
                    @error('condiciones') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
                  </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label class="pull-left">Indique el número telefónico (whatpsapp) de atención al cliente <small style="color:red;"> *</small></label>
                  <input type="text" class="form-control @error('atencion') is-invalid  @enderror" wire:model="atencion" placeholder="(ejemplo: +56 911223344) ">
                  @error('atencion') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
              </div>
                <div class="form-group col-md-6">
                    <label class="pull-left">Indique su correo de contacto <small style="color:red;"> *</small></label>
                  <input type="text" class="form-control @error('correo') is-invalid  @enderror" wire:model="correo">
                  @error('correo') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
                </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="pull-left">Ingrese la dirección de la página web su negocio </label>
                <input type="text" class="form-control" wire:model="direccion">
            </div>
              <div class="form-group col-md-6">
                  <label class="pull-left">Indique el nombre del Facebook de su negocio </label>
                <input type="text" class="form-control" wire:model="facebook">
              </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="pull-left">Indique el nombre de Instagram de su negocio </label>
              <input type="text" class="form-control" wire:model="instagram">
          </div>
            <div class="form-group col-md-6">
                <label class="pull-left">Agrega una descripción de tu negocio <small style="color:red;"> *</small></label>
                <textarea class="form-control @error('descripcion') is-invalid  @enderror" wire:model="descripcion"></textarea>
                @error('descripcion') 
                      <span class="invalid-feedback">{{ $message }}</span> 
                      @enderror
            </div>
        </div>
        <div class="form-group row">
          <label>Adjunta una foto (achivo JPEG o PNG) con logotipo que identifique tu negocio <small style="color:red;"> *</small></label>
          <input type="file" class="form-control @error('imagen') is-invalid  @enderror" wire:model="imagen">
          @error('imagen') 
          <span class="invalid-feedback">{{ $message }}</span> 
          @enderror
          <br>
                        <small style="color: red">*La imagen debe ser de 360X220</small>
        </div>
                <div class="form-group row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8"><button class="btn btn-primary btn-block" id="InsertDatos">Ingresar Datos</button>
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
@push('scripts')
<script type="text/javascript">
        $(document).ready(function() {
          $('.hartos').select2({
                placeholder: '{{__('Seleccione Opción')}}'
            });
        $('.hartos').on('change', function (e) {
            var data = $('.hartos').select2("val");
            @this.set('pagos', data);
        });
        });
</script>
@endpush
