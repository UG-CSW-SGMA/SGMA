@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Nueva Categoría</h6>
@endsection



@section('contenido')
<form action="categorias" method="POST">
    @csrf

    <div class="mb-3">
        <label for="txtTipoServicio" class="form-label">Tipo Servicio</label>
        <select class="form-select" id="txtTipoServicio" name="txtTipoServicio" required>
            <option selected disabled value="">Escoja...</option>
            @foreach($tiposServicios as $tp)
            <option value="{{$tp->id}}">{{$tp->Nombre}}</option>
            @endforeach

        </select>
        <div id="msjValidacion_Rol" class="invalid-feedback">
            Escoja un Tipo Servicio.
        </div>
    </div>

    <div class="mb-3    ">
        <label for="txtNombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="txtNombre" name="txtNombre" maxlength="80" aria-describedby="msjValidacion_Nombre" placeholder="Nombre completo de la categoría" required>
        <div class="valid-feedback">
            Datos correctos!
        </div>
        <div id="msjValidacion_Nombre" class="invalid-feedback">
            Debe llenar el campo!.
        </div>
    </div>

    <div class="mb-3    ">
        <label for="txtDescripcion" class="form-label">Descripcion</label>
        <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" maxlength="80" aria-describedby="msjValidacion_Descrip" placeholder="Descripción corta">
        <div class="valid-feedback">
            Datos correctos!
        </div>
        <div id="msjValidacion_Nombre" class="invalid-feedback">
            Debe llenar el campo!.
        </div>
    </div>

    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
        <!-- <button type="submit" class="btn btn-primary" name="action" id="#" value="add" data-dismiss="modal">Guardar</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="7">Cerrar</button>
        <button type="submit" class="btn btn-primary" tabindex="8">Guardar</button>
    </div>
</form>
@endsection