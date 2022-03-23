@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Editar Vehículo</h6>
@endsection

@section('contenido')
<form action="vehiculos/{{$vehiculo->id}}" class="row g-3 needs-validation" novalidate method="POST">
    @csrf
    @method('PUT')

    <div class="col-md-6 py-2 has-validation">
        <label for="" class="form-label">Propietario</label>

        <select class="form-select" id="cliente" name="cliente" required>
            <option selected disabled value="">Escoja...</option>
            @foreach($clientes as $cliente)
            <option @if($vehiculo->SujetoId==$cliente->id) selected @endif value="{{$cliente->id}}">{{$cliente->Nombre}} {{$cliente->Apellido}}</option>
            @endforeach
        </select>
        <div id="msjValidacion_Rol" class="invalid-feedback">
            Escoja un propietario.
        </div>

    </div>
    <div class="col-md-6 py-2 has-validation">
        <label for="placa" class="form-label">Placa</label>
        <input id="placa" name="placa" type="text" class="form-control" aria-describedby="msjValidacion_Nombre" tabindex="1" required value="{{$vehiculo->Placa}}">
        <div id="msjValidacion_Nombre" class="invalid-feedback">
            ¡El vehículo ya se encuentra registrado!
        </div>
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Marca</label>
        <input id="marca" name="marca" type="text" class="form-control" tabindex="2" required value="{{$vehiculo->Marca}}">
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Modelo</label>
        <input id="modelo" name="modelo" type="text" class="form-control" tabindex="3" required value="{{$vehiculo->Modelo}}">
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Tipo</label>
        <input id="tipo" name="tipo" type="text" class="form-control" tabindex="4" value="{{$vehiculo->Tipo}}">
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Año</label>
        <input id="anio" name="anio" type="number" min="1900" max="2023" class="form-control" tabindex="5" required value="{{$vehiculo->Anio}}">
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Color</label>
        <input id="color" name="color" type="text" class="form-control" tabindex="6" required value="{{$vehiculo->Color}}">
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Descripción</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="7" value="{{$vehiculo->Descripcion}}">
    </div>

    <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="8">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="submitbutton" tabindex="9">Actualizar</button>
    </div>

</form>


@endsection

<script>
    (
        function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        }


    )()
</script>