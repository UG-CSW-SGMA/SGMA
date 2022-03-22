@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Editar Cliente</h6>
@endsection

@section('contenido')
<form action="clientes/{{$cliente->id}}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="" class="form-label">DNI</label>
        <input id="dni" name="dni" type="text" class="form-control" tabindex="1" required value="{{$cliente->DNI}}">
        <h6 id="mensaje" style="color: red;"></h6>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" tabindex="2" required value="{{$cliente->Nombre}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Apellido</label>
        <input id="apellido" name="apellido" type="text" class="form-control" tabindex="3" required value=" {{$cliente->Apellido}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Dirección</label>
        <input id="direccion" name="direccion" type="text" class="form-control" tabindex="4" value="{{$cliente->Direccion}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Teléfono</label>
        <input id="telefono" name="telefono" type="text" class="form-control" tabindex="5" value="{{$cliente->Telefono}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input id="email" name="email" type="email" class="form-control" tabindex="6" value="{{$cliente->Email}}">
    </div>

    <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="7">Cerrar</button>
        <button type="submit" class="btn btn-primary" tabindex="8">Guardar</button>
    </div>

</form>

@endsection