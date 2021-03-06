@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Nuevo</h6>
@endsection

@section('contenido')
<form action="productos" method="post">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Codigo</label>
        <input id="Codigo" name="Codigo" type="text" class="form-control" tabindex="1" required>
    </div>

    <div class="mb-3">
        <label for="CategoriaId" class="form-label">Tipo de Categoria</label>
        <select class="form-select" id="CategoriaId" name="CategoriaId" tabindex="2" required>
            <option selected disabled value="">Escoja...</option>
            @foreach($categorias as $tc)
            <option value="{{$tc->id}}">{{$tc->Nombre}}</option>
            @endforeach

        </select>
        <div id="msjValidacion_Rol" class="invalid-feedback">
            Escoja un Tipo de Categoria.
        </div>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cantidad de Partes </label>
        <input id="NumeroParte" name="NumeroParte" type="text" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="Nombre" name="Nombre" type="text" class="form-control" tabindex="3" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <input id="Descripcion" name="Descripcion" type="text" class="form-control" tabindex="4" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Precio</label>
        <input id="Precio" name="Precio" type="text" class="form-control" tabindex="5" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Costo</label>
        <input id="Costo" name="Costo" type="text" class="form-control" tabindex="6" required>
    </div>

    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
        <!-- <button type="submit" class="btn btn-primary" name="action" id="#" value="add" data-dismiss="modal">Guardar</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="8">Cerrar</button>
        <button type="submit" class="btn btn-primary" tabindex="9">Guardar</button>
    </div>

</form>

@endsection