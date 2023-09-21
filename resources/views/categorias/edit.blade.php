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
       Editar Categorias
      </div>
      <div class="card-body">
        {!! Form::open(['route' => 'actualizar', 'method' => 'POST','id' => 'FormEditCategorias', 'files' => true]) !!}
        {!! Form::hidden('id_categoria', $categorias->id , ['id' => 'id_categoria']) !!}
        {!! Form::hidden('carpeta', $categorias->carpeta , ['id' => 'carpeta']) !!}
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre Categoria</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese Nombre de Categoria" value="{{ $categorias->nombre }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="6">{{ $categorias->descripcion }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Imagen</label>
                <div class="col-lg-10">
                    <div class="custom-file">
                        <input type="file" name="imagen" id="imgCategoria"><br>
                        <small style="color: red">*La imagen debe ser de 360X300</small>
                    </div>
                    <img src="{{ '/'.$categorias->imagen }}" class="img-fluid" width="360" height="300">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary btn-sm btn-block" id="EditarCategoria">Editar Categoria</button>
                </div>
            </div>
            {!! Form::close() !!}
      </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {

        $('#descripcion').summernote({
        placeholder: 'Ingrese Descripción',
        tabsize: 2,
        height: 100
      });
    

      $('#EditarCategoria').on('click', function(e) {
        e.preventDefault();


        var Nombre = $("#nombre").val();
        var Descripcion = $("#descripcion").val();
        var Img = $("#imgCategoria").val();
        var id = $('#id_categoria').val();
        



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



     var form = $('#FormEditCategorias');
     var url = form.attr('action');
     var formData = new FormData($("#FormEditCategorias")[0]);
     

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
                swal("OK!", "Categoria Editada Correctamente!", "success")
                .then((value) => {
                    $("#FormEditCategorias")[0].reset();
                  location.reload();
                });
             }
          }
      });


     });


    });


        $('#imgCategoria').on("change", function() {
        var o = document.getElementById('imgCategoria');
        var foto = o.files[0];
        var c = 0;
        if (!(/\.(jpg|jpeg)$/i).test(foto.name)) {
            c = 1;
            swal("ERROR!", "Ingrese una imagen con alguno de los siguientes formatos: .jpeg/.jpg!", "error")
                .then((value) => {
                $("#imgCategoria").val('');
            });
        } else {
            var img = new Image();
            img.onload = function() {
            if (this.width.toFixed(0) != 360 && this.height.toFixed(0) != 300) {
                c = 1;
                swal("ERROR!", "Las medidas deben ser: 360 x 300!", "error")
                .then((value) => {
                $("#imgCategoria").val('');
            });
                
            }
            };

            img.src = URL.createObjectURL(foto);
        }
        });
</script>
@endsection