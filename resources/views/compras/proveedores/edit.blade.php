@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Editar Proveedor</h6>
@endsection

@section('contenido')
<form class="row g-3 needs-validation" action="proveedores/{{$ObjSujeto->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="col-md-12">
        <div class="col-sm-6  has-validation" style="padding:0">
            <label for="txtDNI" class="form-label">DNI</label>
            <input id="txtDNI" name="txtDNI" class="form-control" maxlength="13" type="number" aria-describedby="msjValidacion_Nombre" tabindex="1" value="{{$ObjSujeto->DNI}}" disabled>
        </div>

    </div>

    <div class="col-md-6 py-2">
        <label for="txtNombre" class="form-label">Nombre</label>
        <input id="txtNombre" name="txtNombre" type="text" maxlength="20" class="form-control" tabindex="2" required value=" {{$ObjSujeto->Nombre}}">
    </div>

    <div class="col-md-6 py-2">
        <label for="txtApellido" class="form-label">Apellido</label>
        <input id="txtApellido" name="txtApellido" type="text" class="form-control" maxlength="20" tabindex="3" value=" {{$ObjSujeto->Apellido}}">
    </div>
    <div class="col-md-6 py-2">
        <label for="txtTelefono" class="form-label">Teléfono</label>
        <input id="txtTelefono" name="txtTelefono" type="number" class="form-control" maxlength="25" tabindex="4" value=" {{$ObjSujeto->Telefono}}">
    </div>

    <div class="col-md-6 py-2">
        <label for="txtEmail" class="form-label">Email</label>
        <input id="txtEmail" name="txtEmail" type="email" class="form-control" maxlength="25" tabindex="5" required value=" {{$ObjSujeto->Email}}">
    </div>

    <div class="col-md-12 py-2">
        <label for="txtDireccion" class="form-label">Dirección</label>
        <input id="txtDireccion" name="txtDireccion" type="text" maxlength="125" class="form-control" tabindex="6" required value=" {{$ObjSujeto->Direccion }}">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="7">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="submitbutton" tabindex="8">Guardar</button>
    </div>
</form>
@endsection