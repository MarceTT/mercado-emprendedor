@extends('layouts.adminlayout')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">
    <a href="{{ url('/emprendedor/create') }}" class="btn btn-outline-success">
    <i class="fa fa-plus"></i> Nuevo Emprendedor
    </a>
    <a href="{{ url('/emprendedor-excel') }}" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-file-excel-o"></i> Exportar Datos</a>
  </li>
  </ol>
<div class="card border-primary mb-3">
    <div class="card-header" style="background-color: #041E42; color: #00BFB2;">
        Listado de Emprendedores
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="ListadoAreas">
          <thead class="thead-light">
            <tr>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">#</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Imagen</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Nombre</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Categoría</th>
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
    		'ajax' : 'emprendedor/table',
    		'columns' : [
                {data: 'id', name: 'id'},
                {data: 'imagen', name: 'imagen'},
                {data: 'nombre_proyecto', name: 'nombre_proyecto'},
                {data: 'categoria.nombre', name: 'categoria.nombre'},
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
  		url: "emprendedor/"+id,
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