@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Nueva Categoría</h6>
@endsection

@section('contenido')
<form action="/articulos" method="post">
    <div class="mb-3">
        <label for="" class="form-label">Código</label>
        <input id="codigo" name="codigo" type="text" class="form-control" tabindex="1">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="2">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cantidad</label>
        <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="3">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Precio</label>
        <input id="precio" name="precio" type="number" step="any" value="0.0" class="form-control" tabindex="4">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection