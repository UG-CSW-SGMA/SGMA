@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Editar Servicio</h6>
@endsection

@section('contenido')
<form action="servicios/{{$ObjServicio->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="txtNombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="txtNombre" name="txtNombre" maxlength="80" aria-describedby="msjValidacion_Nombre" placeholder="Nombre completo del servicio" required value="{{$ObjServicio->Nombre}}">
        <div class="valid-feedback">
            Datos correctos!
        </div>
        <div id="msjValidacion_Nombre" class="invalid-feedback">
            Debe llenar el campo!.
        </div>
    </div>

    <div class="mb-3    ">
        <label for="txtDescripcion" class="form-label">Descripcion</label>
        <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" maxlength="80" aria-describedby="msjValidacion_Descrip" placeholder="Descripción corta" value="{{$ObjServicio->Descripcion}}">
        <div class="valid-feedback">
            Datos correctos!
        </div>
        <div id="msjValidacion_Nombre" class="invalid-feedback">
            Debe llenar el campo!.
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="7">Cerrar</button>
        <button type="submit" class="btn btn-primary" tabindex="8">Guardar</button>
    </div>
</form>
@endsection