@extends('layouts.adminlayout')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">
    <a href="{{ url('/actividad') }}" class="btn btn-outline-success">
    <i class="fa fa-long-arrow-left"></i> Volver al Listado
    </a>
  </li>
  </ol>
<div class="card border-primary mb-3">
    <div class="card-header">
        Ingreso de Actividad
      </div>
      <div class="card-body">
        {!! Form::open(['route' => 'actividad.store', 'method' => 'POST','id' => 'FormActividad', 'files' => true]) !!}
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre Actividad</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese Nombre de Actividad">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Fecha Actividad</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="fecha" id="fecha" placeholder="Ingrese Fecha de Actividad">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Hora Inicio</label>
                <div class="col-sm-10">
                    <input type="time" class="form-control" name="hora_inicio" id="hora_inicio" min="09:00" max="18:00">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Hora Término</label>
                <div class="col-sm-10">
                    <input type="time" class="form-control" name="hora_fin" id="hora_fin" min="09:00" max="18:00">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Detalle Actividad</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="detalles" id="detalles" rows="6"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary btn-sm btn-block" id="InsertarActividad">Ingresar Actividad</button>
                </div>
            </div>
            {!! Form::close() !!}
      </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
    
    $('#detalles').summernote({
        placeholder: 'Ingrese Detalle',
        tabsize: 2,
        height: 100
      });

    var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#fecha').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd',
            minDate: today
        });


      $('#InsertarActividad').on('click', function(e) {
        e.preventDefault();

        var Nombre = $("#nombre").val();
        var Fecha = $("#fecha").val();
        var HoraInicio = $("#hora_inicio").val();
        var HoraFin = $("#hora_fin").val();
        var Detalle = $("#detalles").val();


           if(Nombre === '')
           {
	           	toastr.error('Ingrese Nombre de Actividad', 'Error!', {timeOut: 3000})
	            return false;
           }
           if(Fecha === '')
           {
	           	toastr.error('Ingrese Fecha de la actividad', 'Error!', {timeOut: 3000})
	            return false;
           }
           if(HoraInicio === '')
           {
	           	toastr.error('Ingrese Hora de inicio', 'Error!', {timeOut: 3000})
	            return false;
           }
           if(HoraFin === '')
           {
	           	toastr.error('Ingrese Hora de término', 'Error!', {timeOut: 3000})
	            return false;
           }
           if(HoraInicio >= HoraFin)
           {
	           	toastr.error('La Hora de inicio no puede ser menor o igual a la hora de término', 'Error!', {timeOut: 3000})
	            return false;
           }

           if(Detalle === '')
           {
	           	toastr.error('Ingrese Detalle Actividad', 'Error!', {timeOut: 3000})
	            return false;
           }



           var form = $('#FormActividad');
           var url = form.attr('action');

           $.ajax({
	          url: url,
	          type: 'POST',
	          data: form.serialize(),
	          dataType: 'JSON',
	          success: function(respuesta) {
	             if (respuesta.message == 'success') {
	                swal("OK!", "Actividad Creada Correctamente!", "success")
	                .then((value) => {
                        $("#FormActividad")[0].reset();
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

    


</script>
@endsection