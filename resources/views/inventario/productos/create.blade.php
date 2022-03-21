@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Nuevo</h6>
@endsection

@section('contenido')
<form action="productos" method="post">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Codigo</label>
        <input id="codigo" name="codigo" type="text" class="form-control" tabindex="1" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Categoria</label>
        <input id="categoria" name="categoria" type="text" class="form-control" tabindex="1" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" tabindex="2" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="3" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Precio</label>
        <input id="precio" name="precio" type="text" class="form-control" tabindex="4">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Costo</label>
        <input id="costo" name="costo" type="number" min="1900" max="2023" class="form-control" tabindex="5" required>
    </div>

    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
        <!-- <button type="submit" class="btn btn-primary" name="action" id="#" value="add" data-dismiss="modal">Guardar</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="8">Cerrar</button>
        <button type="submit" class="btn btn-primary" tabindex="9">Guardar</button>
    </div>

</form>

@endsection