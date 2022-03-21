@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Eliminar</h6>
@endsection

@section('contenido')
<form action="{{route('proveedores.destroy',$ObjProveedor->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <div class="mb-3  text-center  ">
        <p>Desea eliminar el proveedor</p>
        <h4>{{$ObjProveedor->Nombre}}</h4>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="7">Cerrar</button>
        <button type="submit" class="btn btn-primary" tabindex="8">Ok</button>
    </div>
</form>
@endsection