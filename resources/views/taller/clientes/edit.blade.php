@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Editar Cliente</h6>
@endsection

@section('contenido')
<form action="clientes/{{$cliente->id}}" class="row g-3 needs-validation" novalidate method="POST">
    @csrf
    @method('PUT')

    <div class="col-md-12">
        <div class="col-sm-6  has-validation" style="padding:0">
            <label for="dni" class="form-label">DNI</label>
            <input id="dni" name="dni" type="number" class="form-control" maxlength="13" tabindex="1" required aria-describedby="msjValidacion_Nombre" value="{{$cliente->DNI}}">
            <div id="msjValidacion_Nombre" class="invalid-feedback">
                ¡El cliente ya se encuentra registrado!
            </div>
        </div>
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" tabindex="2" required value="{{$cliente->Nombre}}">
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Apellido</label>
        <input id="apellido" name="apellido" type="text" class="form-control" tabindex="3" required value=" {{$cliente->Apellido}}">
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Teléfono</label>
        <input id="telefono" name="telefono" type="text" class="form-control" tabindex="5" value="{{$cliente->Telefono}}">
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Email</label>
        <input id="email" name="email" type="email" class="form-control" tabindex="6" value="{{$cliente->Email}}">
    </div>

    <div class="col-md-12 py-2">
        <label for="" class="form-label">Dirección</label>
        <input id="direccion" name="direccion" type="text" class="form-control" tabindex="4" value="{{$cliente->Direccion}}">
    </div>
    <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="7">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="submitbutton" tabindex="8">Actualizar</button>
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