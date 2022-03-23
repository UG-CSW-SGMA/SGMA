@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Nueva Orden de Atencion</h6>
@endsection


@section('contenido')

<form action="oda" method="post">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Numero ODA</label>
        <input id="numero" name="numero" type="number" class="form-control" tabindex="1" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Fecha de ingreso</label>
        <input id="fecha" name="fecha" type="date" class="form-control" tabindex="2" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Documento</label>
        <input id="documento" name="documento" type="text" class="form-control" tabindex="3" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cliente</label>
        <input id="cliente" name="cliente" type="text" class="form-control" tabindex="4">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Teléfono</label>
        <input id="telefono" name="telefono" type="text" class="form-control" tabindex="5">
    </div>
   
    <div class="mb-3">
        <label for="" class="form-label">Dirección</label>
        <input id="direccion" name="direccion" type="direccion" class="form-control" tabindex="6">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input id="email" name="email" type="email" class="form-control" tabindex="7">
    </div>

    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
        <!-- <button type="submit" class="btn btn-primary" name="action" id="#" value="add" data-dismiss="modal">Guardar</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="7">Cerrar</button>
        <button type="submit" class="btn btn-primary" tabindex="8">Guardar</button>
    </div>

</form>