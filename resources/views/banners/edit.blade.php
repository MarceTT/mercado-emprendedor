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
        Editar Banner
      </div>
      <div class="card-body">
        {!! Form::open(['route' => 'banner.actualizar', 'method' => 'POST','id' => 'FormEditBanner', 'files' => true]) !!}
        {!! Form::hidden('id', $banners->id , ['id' => 'id']) !!}
        {!! Form::hidden('carpeta', $banners->carpeta , ['id' => 'carpeta']) !!}
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Imagen Banner</label>
                <div class="col-lg-10">
                    <div class="custom-file">
                        <input type="file" name="imagen" id="imgBanner"><br>
                        <small style="color: red">*La imagen debe ser de 1920X400</small>
                    </div>
                    <img src="{{ '/'.$banners->imagen }}" class="img-fluid" width="500" height="350">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary btn-sm btn-block" id="EditarBanner">Editar Banner</button>
                </div>
            </div>
            {!! Form::close() !!}
      </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {



      $('#EditarBanner').on('click', function(e) {
        e.preventDefault();

        var Img = $("#imgBanner").val();
        var id = $('#id').val();
        

        if(Img === '')
        {
            toastr.error('Ingrese una Imagen', 'Error!', {timeOut: 3000})
            return false;
        }


     var form = $('#FormEditBanner');
     var url = form.attr('action');
     var formData = new FormData($("#FormEditBanner")[0]);
     

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: url,
      type: 'POST',
      data: formData,
      cache:false,
      contentType: false,
      processData: false,
      dataType: 'JSON',
      success: function(respuesta) {
            if (respuesta.message == 'success') {
                swal("OK!", "Banner Editado Correctamente!", "success")
                .then((value) => {
                    $("#FormEditBanner")[0].reset();
                  location.reload();
                });
             }
          }
      });


     });


    });



    $('#imgBanner').on("change", function() {
        var o = document.getElementById('imgBanner');
        var foto = o.files[0];
        var c = 0;
        if (!(/\.(jpg|png)$/i).test(foto.name)) {
            c = 1;
            swal("ERROR!", "Ingrese una imagen con alguno de los siguientes formatos: .jpeg/.jpg/.png.!", "error")
            .then((value) => {
                $("#imgBanner").val('');
            });
        } else {
            var img = new Image();
            img.onload = function() {
            if (this.width.toFixed(0) != 1920 && this.height.toFixed(0) != 400) {
                c = 1;
                swal("ERROR!", "Las medidas deben ser: 1920 x 400!", "error")
                .then((value) => {
                $("#imgBanner").val('');
            });
                
            }
            };

            img.src = URL.createObjectURL(foto);
        }
        });

</script>
@endsection