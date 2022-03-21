@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Editar Categoría</h6>
@endsection

@section('contenido')
<form action="{{route('categorias.destroy',$ObjCategoria->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <div class="mb-3    ">
        <p>Desea eliminar</p>
        <h4>{{$ObjCategoria->Nombre}}</h4>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="7">Cerrar</button>
        <button type="submit" class="btn btn-primary" tabindex="8">Ok</button>
    </div>
</form>
@endsection