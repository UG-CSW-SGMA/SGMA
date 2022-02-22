@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Nueva Categoría</h6>
@endsection

@section('contenido')
<form action="categorias" method="post">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Tipo Servicio</label>
        <select id="tpServicio" name="tpServicio" class="form-select form-control" required tabindex="1">
            <option value="-1" selected>--Seleccione Opcion--</option>
            @foreach($tiposServicios as $tipoServicio)
            <option value="{{$tipoServicio->Id}}">{{$tipoServicio->Nombre}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" tabindex="2" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="3">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>

@endsection