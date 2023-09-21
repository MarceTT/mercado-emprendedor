@extends('layouts.adminlayout')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">
    <a href="{{ url('/actividad/create') }}" class="btn btn-outline-success">
    <i class="fa fa-plus"></i> Nueva Actividad
    </a>
  </li>
  </ol>
<div class="card border-primary mb-3">
    <div class="card-header" style="background-color: #041E42; color: #00BFB2;">
        Listado de Actividades
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="ListadoAreas">
          <thead class="thead-light">
            <tr>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">#</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Nombre</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Fecha</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Hora Inicio</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Hora Término</th>
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
            'order' : [0, 'desc'],
            'processing' : true,
    		'serverSide' : true,
    		'ajax' : 'actividad/table',
    		'columns' : [
                {data: 'id', name: 'id'},
                {data: 'nombre', name: 'nombre'},
                {data: 'fecha', name: 'fecha'},
                {data: 'hora_inicio', name: 'hora_inicio'},
                {data: 'hora_termino', name: 'hora_termino'},
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
  		url: "actividad/"+id,
        type: 'DELETE',
        dataType: 'JSON',
        success: function(respuesta) {
          if (respuesta.message == 'success') {
              swal("OK!", "Actividad Eliminada Correctamente!", "success")
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