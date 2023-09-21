@extends('layouts.adminlayout')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">
        <a href="{{ url('/unidos') }}" class="btn btn-outline-success">
            <i class="fa fa-arrow-left"></i> Volver
            </a>
  </li>
  </ol>
<div class="card border-primary mb-3">
    <div class="card-header">
        Detalle Emprendedores Unidos Recientemente
      </div>
      <div class="card-body">
        <table class="table table-bordered">
            <tbody>
            <tr>
            <td><strong>Nombre</strong></td>
            <td><p>{{ $unidos->nombre }}</p></td>
            </tr>
            <tr>
            <td><strong>Rut</strong></td>
            <td><p>{{ $unidos->rut }}</p></td>
            </tr>
            <tr>
            <td><strong>Carrera</strong></td>
            <td><p>{{ $unidos->carrera }}</p></td>
            </tr>
            <tr>
            <td><strong>Sede</strong></td>
            <td><p>{{ $unidos->sede }}</p></td>
            </tr>
            <tr>
            <td><strong>Nombre Negocio</strong></td>
            <td><p>{{ $unidos->nombrenegocio }}</p></td>
            </tr>
            <tr>
            <td><strong>Ciudad Negocio</strong></td>
            <td><p>{{ $unidos->ciudadnegocio }}</p></td>
            </tr>
            <tr>
            <td><strong>Rubro</strong></td>
            <td><p>{{ $unidos->rubro }}</p></td>
            </tr>
            <tr>
            <td><strong>Medios de Pago</strong></td>
            <td><p>{{ $unidos->pagos }}</p></td>
            </tr>
            <tr>
            <td><strong>Realiza Despacho</strong></td>
            <td><p>{{ $unidos->despacho }}</p></td>
            </tr>
            <tr>
            <td><strong>Condiciones de Despacho</strong></td>
            <td><p>{{ $unidos->condiciones }}</p></td>
            </tr>
            <tr>
            <td><strong>Número telefónico (whatpsapp)</strong></td>
            <td><p>{{ $unidos->atencion }}</p></td>
            </tr>
            <tr>
            <td><strong>Correo de Contacto</strong></td>
            <td><p>{{ $unidos->correo }}</p></td>
            </tr>
            <tr>
            <td><strong>URL web del Negocio</strong></td>
            <td><p>{{ $unidos->direccion }}</p></td>
            </tr>
            <tr>
            <td><strong>Facebook</strong></td>
            <td><p>{{ $unidos->facebook }}</p></td>
            </tr>
            <tr>
            <td><strong>Instagram</strong></td>
            <td><p>{{ $unidos->instagram }}</p></td>
            </tr>
            <tr>
            <td><strong>Descripción del Negocio</strong></td>
            <td><p>{{ $unidos->descripcion }}</p></td>
            </tr>
            <tr>
            <td><strong>Imagen</strong></td>
            <td><p><img src="{{ asset('storage/'.$unidos->carpeta) }}" width="160" height="160" /></p><br>
            <a href="{{ asset('storage/'.$unidos->carpeta) }}" class="btn btn-link" target="_blank">Descargar</a></td>
            </tr>
            </tbody>
            </table>
      </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
   
</script>
@endsection