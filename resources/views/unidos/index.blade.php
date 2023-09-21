@extends('layouts.adminlayout')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">
  </li>
  </ol>
<div class="card mb-3" style="border-color: #E0004D;">
    <div class="card-header" style="background-color: #041E42; color: #00BFB2;">
        Listado de Emprendedores Unidos Recientemente
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="ListadoAreas">
          <thead class="thead-light">
            <tr>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">#</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Imagen</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Nombre</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Fecha Ingreso</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Acciones</th>
            </tr>
          </thead>
        </table>
        </div>
      </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('.table').DataTable({
			"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
            'processing' : true,
    		'serverSide' : true,
    		'ajax' : 'unidos/table',
    		'columns' : [
                {data: 'id', name: 'id'},
                {data: 'imagen', name: 'imagen'},
                {data: 'nombre', name: 'nombre'},
                {data: 'created_at', name: 'created_at'},
    	        {data: 'acciones', name: 'acciones',orderable: false, searchable: false},

    		]

        });
        
        });


var Eliminar = function(id)
{
  swal({
  title: "Esta Seguro?",
  text: "Una vez eliminado, no podrá recuperar estos datos!",
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
  		url: "unidos/"+id,
        type: 'DELETE',
        dataType: 'JSON',
        success: function(respuesta) {
          if (respuesta.message == 'success') {
              swal("OK!", "Emprendedor Eliminado Correctamente!", "success")
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
</script>
@endsection