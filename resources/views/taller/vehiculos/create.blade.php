@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Nuevo Vehículo</h6>
@endsection


@section('contenido')

<form action="vehiculos" method="post">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Placa</label>
        <input id="placa" name="placa" type="text" class="form-control" tabindex="1" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Placa</label>
        <input id="placa" name="placa" type="text" class="form-control" tabindex="1" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Marca</label>
        <input id="marca" name="marca" type="text" class="form-control" tabindex="2" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Modelo</label>
        <input id="modelo" name="modelo" type="text" class="form-control" tabindex="3" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Tipo</label>
        <input id="tipo" name="tipo" type="text" class="form-control" tabindex="4">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Año</label>
        <input id="anio" name="anio" type="number" min="1900" max="2023" class="form-control" tabindex="5" required>
    </div>
   
    <div class="mb-3">
        <label for="" class="form-label">Color</label>
        <input id="color" name="color" type="text" class="form-control" tabindex="6" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="7">
    </div>

    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
        <!-- <button type="submit" class="btn btn-primary" name="action" id="#" value="add" data-dismiss="modal">Guardar</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="8">Cerrar</button>
        <button type="submit" class="btn btn-primary" tabindex="9">Guardar</button>
    </div>

</form>


@endsection