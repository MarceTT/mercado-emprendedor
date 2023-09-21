@extends('layouts.adminlayout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Listado de Usuarios</li>
    </ol>
  </nav>
  <div class="card border-primary mb-3">
    <div class="card-header" style="background-color: #041E42; color: #00BFB2;">
      Usuarios
    </div>
    <div class="card-body">
    <table class="table mt-30 table-striped" id="ListadoAreas">
    <thead class="thead-dark">
      <tr>
        <th scope="col" style="background-color: #041E42; color: #00BFB2;">#</th>
        <th scope="col" style="background-color: #041E42; color: #00BFB2;">Nombre Usuario</th>
        <th scope="col" style="background-color: #041E42; color: #00BFB2;">Email</th>
        <th scope="col" style="background-color: #041E42; color: #00BFB2;">Perfil</th>
        <th scope="col" style="background-color: #041E42; color: #00BFB2;">Estado</th>
        <th scope="col" style="background-color: #041E42; color: #00BFB2;">Acciones</th>
      </tr>
    </thead>
  </table>
</div>
  </div>
  @include('usuarios.edit')
@endsection
@section('scripts')
<script type="text/javascript">
	$(document).ready(function($){
		$('.table').DataTable({
			"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
            'processing' : true,
    		'serverSide' : true,
    		'ajax' : '/usuarios/table',
    		'columns' : [
    			{data: 'id', name: 'id'},
    			{data: 'name', name: 'name'},
    			{data: 'email', name: 'email'},
    			{data: 'type', name: 'type'},
    			{data: 'access', name: 'access'},
    	        {data: 'acciones', name: 'acciones',orderable: false, searchable: false},
    		]

		});
		$('.table').on('draw.dt', function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });

});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


var Eliminar = function(id)
{
  swal({
  title: "Esta Seguro?",
  text: "Una vez eliminado, no podrá recuperar este usuario!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
  	$.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
  		  url: "usuarios/"+id,
        type: 'DELETE',
        dataType: 'JSON',
        success: function(respuesta) {
          if (respuesta.message == 'success') {
              swal("OK!", "usuario Eliminado Correctamente!", "success")
              .then((value) => {
                $('.table').DataTable().ajax.reload();
              });
           }
       },
          error: function (respuesta) {
            swal("Error!", "Error de conexion, intentelo más tarde.", "error");
          }

  	});
    } else {
  }
});
}


var Editar = function(id)
{
  $('#editModalUsuario').modal({backdrop: 'static', keyboard: false, show: true}); 
  var ruta = "usuarios/"+id+"/edit";
  $.get(ruta, function(data){
    $('#nombre').val(data.name);
    $('#user_mail').val(data.envio_correo);
    //$("#tipo option[value=" + val.type + "]").attr("selected", true);
    if(data.type == "admin"){
      $('#Tipos').hide();
    }else{
      $('#Tipos').show();
      $('#tipo  option[value="'+data.type+'"]').prop("selected", true);
    }

    
    
    $('#id').val(data.id);
    var Valor = data.access;
    var Descarga = data.descarga;

    if(Valor == 1){
      $('#access').prop("checked", true);
    }else{
      $('#access').prop("checked", false);
    }





  });
}
$('#tipo').change(function(){
           var valor = $('#tipo').val();
            if(valor === "observador"){
              $('#Sedes').hide();
              $('#sede').val("");
            }else{
              $('#Sedes').show();
            }
	});







$('#EditRegistro').on('click', function(e) {
    e.preventDefault();

    var nombre = $('#nombre').val();
    var id = $('#id').val();
    var url = "/usuarios/"+id;

    if(nombre === '')
    {
      toastr.error('Ingrese Nombre ', 'Error!', {timeOut: 3000})
      return false;
    }

    var form = $('#FormEditUsuario');

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: url,
      type: 'PUT',
      data: form.serialize(),
      dataType: 'JSON',
      success: function(respuesta) {
            if (respuesta.message == 'success') {
                $("#FormEditUsuario")[0].reset();
                swal("OK!", "Usuario Editado Correctamente!", "success")
                .then((value) => {
                  $('.table').DataTable().ajax.reload();
                });
                $("#editModalUsuario").modal('hide');
                
             }
          }
      });
});




    </script>
@endsection