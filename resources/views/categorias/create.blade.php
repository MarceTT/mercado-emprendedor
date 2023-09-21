@extends('layouts.adminlayout')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">
    <a href="{{ url('/categoria') }}" class="btn btn-outline-success">
    <i class="fa fa-long-arrow-left"></i> Volver al Listado
    </a>
  </li>
  </ol>
<div class="card border-primary mb-3">
    <div class="card-header">
        Ingreso de Cursos
      </div>
      <div class="card-body">
        {!! Form::open(['route' => 'categoria.store', 'method' => 'POST','id' => 'FormCategorias', 'files' => true]) !!}
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre Categoria</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese Nombre de Categoria">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="6"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Imagen</label>
                <div class="col-lg-10">
                    <div class="custom-file">
                        <input type="file" name="imagen" id="imgCategoria"><br>
                        <small style="color: red">*La imagen debe ser de 360X300</small>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary btn-sm btn-block" id="InsertarCategoria">Ingresar Categoria</button>
                </div>
            </div>
            {!! Form::close() !!}
      </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="/admintemplate/assets/select2/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

         $('#descripcion').summernote({
        placeholder: 'Ingrese Descripción',
        tabsize: 2,
        height: 100
      });
      $('.selectpicker').selectpicker();

      /*$(".js-example-basic-multiple").select2({
        maximumSelectionLength: 3
      });*/


      $('#InsertarCategoria').on('click', function(e) {
        e.preventDefault();

        var Nombre = $("#nombre").val();
        var Descripcion = $("#descripcion").val();
        var Img = $("#imgCategoria").val();


           if(Nombre === '')
           {
	           	toastr.error('Ingrese Nombre de Curso', 'Error!', {timeOut: 3000})
	            return false;
           }
           if(Descripcion === '')
           {
	           	toastr.error('Ingrese Descripción', 'Error!', {timeOut: 3000})
	            return false;
           }
           if(Img === '')
           {
	           	toastr.error('Ingrese Imagen de 1920X880', 'Error!', {timeOut: 3000})
	            return false;
           }



           var form = $('#FormCategorias');
           var url = form.attr('action');
           var formData = new FormData($("#FormCategorias")[0]);

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
	                swal("OK!", "Categoria Ingresada Correctamente!", "success")
	                .then((value) => {
                        $("#FormCategorias")[0].reset();
	                  location.reload();
	                });
              }
	         }
	    });

      });

      /*$('.estados').on('change', function() {
             if ($(this).is(':checked') ) {
                
                $('#Arancel').show();
                $('#Matricula').show();
                $("#arancel").prop( "readonly", false );
                $("#matricula").prop( "readonly", false );
                
             } else {
                $('#Arancel').hide();
                $('#Matricula').hide();
                $("#arancel").prop( "readonly", true );
                $("#matricula").prop( "readonly", true );
                
            }
        });*/




    });

    function mayus(e) {
    e.value = e.value.toUpperCase();
    }
    function soloNumeros(e)
    {
      var key = window.Event ? e.which : e.keyCode
      return ((key >= 48 && key <= 57) || (key==8))
    }

    

    $('#imgCategoria').on("change", function() {
        var o = document.getElementById('imgCategoria');
        var foto = o.files[0];
        var c = 0;
        if (o.files.length == 0 || !(/\.(jpg|jpeg)$/i).test(foto.name)) {
            c = 1;
            swal("ERROR!", "Ingrese una imagen con alguno de los siguientes formatos: .jpeg/.jpg!", "error")
            .then((value) => {
                $("#imgCategoria").val('');
            });
        }
        });
</script>
@endsection