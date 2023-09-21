@extends('layouts.adminlayout')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">
    <a href="{{ url('/emprendedor') }}" class="btn btn-outline-success">
    <i class="fa fa-long-arrow-left"></i> Volver al Listado
    </a>
  </li>
  </ol>
<div class="card border-primary mb-3">
    <div class="card-header">
        Ingreso de Emprendedor
      </div>
      <div class="card-body">
        {!! Form::open(['route' => 'emprendedor.store', 'method' => 'POST','id' => 'FormEmprendedor', 'files' => true]) !!}
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Categoría Emprendedor</label>
            <div class="col-sm-10">
            <select class="form-control custom-select custom-select-sm" name="categoria" id="Categorias">
                <option value="0">--Seleccione Categoria--</option>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
            </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre Proyecto</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese Nombre de Proyecto">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Sede Proyecto</label>
                <div class="col-sm-10">
                    <select class="form-control" name="sede" id="sede">
                          <option value="0">--Elija Sede--</option>
                          @foreach($sedes as $sede)
			                <option value="{{ $sede->nombre }}">{{ $sede->nombre }}</option>
			                @endforeach
                      </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Equipo</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="equipo" id="equipo" rows="6"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Contacto</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="contacto" id="contacto" rows="6"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Resumen</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="resumen" id="resumen" rows="6"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Url Video</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="video" id="video">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Imagen Grande</label>
                <div class="col-lg-10">
                    <div class="custom-file">
                        <input type="file" name="grande" id="imgGrande"><br>
                        <small style="color: red">*La imagen debe ser de 1920X800</small>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Imagen</label>
                <div class="col-lg-10">
                    <div class="custom-file">
                        <input type="file" name="imagen" id="imgBanner"><br>
                        <small style="color: red">*La imagen debe ser de 360X220</small>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Logo</label>
                <div class="col-lg-10">
                    <div class="custom-file">
                        <input type="file" name="logo" id="imgLogo"><br>
                        <small style="color: red">*La imagen debe ser de 360X220</small>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Activar</div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input estados" value="1" type="checkbox" name="estado" id="Estado">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary btn-sm btn-block" id="InsertarEmprendedor">Ingresar Emprendedor</button>
                </div>
            </div>
            {!! Form::close() !!}
      </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {

         $('#equipo').summernote({
        placeholder: 'Ingrese Descripción',
        tabsize: 2,
        height: 100
      });
      $('#contacto').summernote({
        placeholder: 'Ingrese Descripción',
        tabsize: 2,
        height: 100
      });
      $('#resumen').summernote({
        placeholder: 'Ingrese Descripción',
        tabsize: 2,
        height: 100
      });

      $('#InsertarEmprendedor').on('click', function(e) {
        e.preventDefault();

        var Nombre = $("#nombre").val();
        var Descripcion = $("#descripcion").val();
        var Equipo = $("#equipo").val();
        var Contacto = $("#contacto").val();
        var Resumen = $("#resumen").val();
        var Video = $("#video").val();

           if($('#Categorias').val()==0){
                toastr.error('Ingrese Categoria del Emprendedor', 'Error!', {timeOut: 3000})
	            return false;
            }
            if($('#sede').val()==0){
                toastr.error('Ingrese Sede del Emprendedor', 'Error!', {timeOut: 3000})
	            return false;
            }
           if(Nombre === '')
           {
	           	toastr.error('Ingrese Nombre del Proyecto', 'Error!', {timeOut: 3000})
	            return false;
           }
           if(Descripcion === '')
           {
	           	toastr.error('Ingrese Descripción', 'Error!', {timeOut: 3000})
	            return false;
           }
           if(Equipo === '')
           {
	           	toastr.error('Ingrese Equipo del Proyecto', 'Error!', {timeOut: 3000})
	            return false;
           }
           if(Contacto === '')
           {
	           	toastr.error('Ingrese Contaco', 'Error!', {timeOut: 3000})
	            return false;
           }
           /*if(Video === '')
           {
	           	toastr.error('Ingrese Video del Proyecto', 'Error!', {timeOut: 3000})
	            return false;
           }*/




           var form = $('#FormEmprendedor');
           var url = form.attr('action');
           var formData = new FormData($("#FormEmprendedor")[0]);

           $.ajax({
	          url: url,
	          type: 'POST',
	          data: formData,
	          cache:false,
	          contentType: false,
	          processData: false,
	          dataType: 'JSON',
	          success: function(respuesta) {
	             if (respuesta.message == 'success') {
	                swal("OK!", "Emprendedor Ingresado Correctamente!", "success")
	                .then((value) => {
                        $("#FormEmprendedor")[0].reset();
	                  location.reload();
	                });
              }
	         }
	    });

      });





    });

    function mayus(e) {
    e.value = e.value.toUpperCase();
    }
    function soloNumeros(e)
    {
      var key = window.Event ? e.which : e.keyCode
      return ((key >= 48 && key <= 57) || (key==8))
    }


    $('#imgGrande').on("change", function() {
        var o = document.getElementById('imgGrande');
        var foto = o.files[0];
        var c = 0;
        if (o.files.length == 0 || !(/\.(jpg|png)$/i).test(foto.name)) {
            c = 1;
            swal("ERROR!", "Ingrese una imagen con alguno de los siguientes formatos: .jpeg/.jpg/.png.!", "error")
            .then((value) => {
                $("#imgGrande").val('');
            });
        } 
        });

    

    $('#imgBanner').on("change", function() {
        var o = document.getElementById('imgBanner');
        var foto = o.files[0];
        var c = 0;
        if (o.files.length == 0 || !(/\.(jpg|jpeg)$/i).test(foto.name)) {
            c = 1;
            swal("ERROR!", "Ingrese una imagen con alguno de los siguientes formatos: .jpeg/.jpg!", "error")
            .then((value) => {
                $("#imgBanner").val('');
            });
        }
        });

        $('#imgLogo').on("change", function() {
        var o = document.getElementById('imgLogo');
        var foto = o.files[0];
        var c = 0;
        if (o.files.length == 0 || !(/\.(jpg|jpeg)$/i).test(foto.name)) {
            c = 1;
            swal("ERROR!", "Ingrese una imagen con alguno de los siguientes formatos: .jpeg/.jpg!", "error")
            .then((value) => {
                $("#imgLogo").val('');
            });
        } 
        });
</script>
@endsection