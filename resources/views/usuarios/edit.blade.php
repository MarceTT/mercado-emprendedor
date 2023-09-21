<!-- Modal -->
<div class="modal fade" id="editModalUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edición de Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        {!! Form::open(['id' => 'FormEditUsuario', 'method' => 'PUT']) !!}
        {!! Form::hidden('id', false , ['id' => 'id']) !!}
        {!! Form::hidden('user_mail', false , ['id' => 'user_mail']) !!}
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre usuario') !!}
            {!! Form::text('nombre', false , ['class' => 'form-control', 'id' => 'nombre']) !!}
          </div>
          <div class="form-group" id="Tipos">
            {!! Form::label('tipo', 'Tipo de usuario') !!}
            <select class="form-control" name="tipos" id="tipo">
              <option value="">Seleccione Rol</option>
              <option value="admin">Administrador</option>
              <option value="user">Usuario</option>
            </select>
          </div>
          <div class="form-check custom-control custom-checkbox">
            {!! Form::checkbox('access', '1', null, ['class' => 'custom-control-input', 'id' => 'access']) !!}
            <label class="custom-control-label" for="access">activado</label>
          </div>
            <br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-success" id="EditRegistro"><i class="icon mdi mdi-account-check text-size-20"></i> Editar Registro</button>
        </div>
         {!! Form::close() !!}
      </div>
    </div>
  </div>