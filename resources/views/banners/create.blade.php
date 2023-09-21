@extends('layouts.adminlayout')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">
    <a href="{{ url('/banner') }}" class="btn btn-outline-success">
    <i class="fa fa-long-arrow-left"></i> Volver al Listado
    </a>
  </li>
  </ol>
<div class="card border-primary mb-3">
    <div class="card-header">
        Ingreso de Banner
      </div>
      <div class="card-body">
        {!! Form::open(['route' => 'banner.store', 'method' => 'POST','id' => 'Formbanners', 'files' => true]) !!}
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Imagen</label>
                <div class="col-lg-10">
                    <div class="custom-file">
                        <input type="file" name="imagen" id="imgBanner"><br>
                        <small style="color: red">*La imagen debe ser de 1920X400</small>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary btn-sm btn-block" id="InsertarBanner">Ingresar Banner</button>
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


      $('#InsertarBanner').on('click', function(e) {
        e.preventDefault();

        var Img = $("#imgBanner").val();


           if(Img === '')
           {
	           	toastr.error('Ingrese Imagen de 1920X400', 'Error!', {timeOut: 3000})
	            return false;
           }



           var form = $('#Formbanners');
           var url = form.attr('action');
           var formData = new FormData($("#Formbanners")[0]);

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
	                swal("OK!", "Banner  Ingresado Correctamente!", "success")
	                .then((value) => {
                        $("#Formbanners")[0].reset();
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
</script>
@endsection