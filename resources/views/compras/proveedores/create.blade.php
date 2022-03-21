@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Nueva Categoría</h6>
@endsection



@section('contenido')

<form class="row g-3" action="proveedores" method="post">
    @csrf
    <div class="col-md-12">
        <div class="col-sm-6" style="padding:0">
            <label for="txtDNI" class="form-label">DNI</label>
            <input id="txtDNI" name="txtDNI" type="text" class="form-control" tabindex="1" required>
        </div>
    </div>

    <div class="col-md-6 py-2">
        <label for="txtNombre" class="form-label">Nombre</label>
        <input id="txtNombre" name="txtNombre" type="text" class="form-control" tabindex="2" required>
    </div>

    <div class="col-md-6 py-2">
        <label for="txtApellido" class="form-label">Apellido</label>
        <input id="txtApellido" name="txtApellido" type="text" class="form-control" tabindex="3">
    </div>
    <div class="col-md-6 py-2">
        <label for="txtTelefono" class="form-label">Teléfono</label>
        <input id="txtTelefono" name="txtTelefono" type="text" class="form-control" tabindex="5">
    </div>

    <div class="col-md-6 py-2">
        <label for="txtEmail" class="form-label">Email</label>
        <input id="txtEmail" name="txtEmail" type="email" class="form-control" tabindex="6" required>
    </div>

    <div class="col-md-12 py-2">
        <label for="txtDireccion" class="form-label">Dirección</label>
        <input id="txtDireccion" name="txtDireccion" type="text" class="form-control" tabindex="4" required>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="7">Cerrar</button>
        <button type="submit" class="btn btn-primary" tabindex="8">Guardar</button>
    </div>

</form>



@endsection