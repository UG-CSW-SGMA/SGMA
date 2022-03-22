@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Editar Producto</h6>
@endsection

@section('contenido')
<form action="productos/{{$ObjProducto->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Codigo</label>
        <input id="Codigo" name="Codigo" type="text" class="form-control" tabindex="1" required value="{{$ObjProducto->Codigo}}">
    </div>

    <div class="mb-3">
        <label for="CategoriaId" class="form-label">Tipo de Categoria</label>
        <select class="form-select" id="CategoriaId" name="CategoriaId" tabindex="2" required value="{{$ObjProducto->CategoriaId}}">
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
        <input id="NumeroParte" name="NumeroParte" type="text" class="form-control" required value="{{$ObjProducto->NumeroParte}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="Nombre" name="Nombre" type="text" class="form-control" tabindex="3" required value="{{$ObjProducto->Nombre}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <input id="Descripcion" name="Descripcion" type="text" class="form-control" tabindex="4" required value="{{$ObjProducto->Descripcion}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Precio</label>
        <input id="Precio" name="Precio" type="text" class="form-control" tabindex="5" required value="{{$ObjProducto->Precio}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Costo</label>
        <input id="Costo" name="Costo" type="text" class="form-control" tabindex="6" required value="{{$ObjProducto->Costo}}">
    </div>

    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
        <!-- <button type="submit" class="btn btn-primary" name="action" id="#" value="add" data-dismiss="modal">Guardar</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="7">Cerrar</button>
        <button type="submit" class="btn btn-primary" tabindex="8">Guardar</button>
    </div>
</form>
@endsection