@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Nuevo Vehículo</h6>
@endsection


@section('contenido')

<form action="vehiculos" class="row g-3 needs-validation" novalidate method="post">
    @csrf


    <div class="col-md-6 py-2 has-validation">
        <label for="" class="form-label">Propietario</label>

        <select class="form-select" id="cliente" name="cliente" required>
            <option selected disabled value="">Escoja...</option>
            @foreach($clientes as $cliente)
            <option value="{{$cliente->id}}">{{$cliente->Nombre}} {{$cliente->Apellido}}</option>
            @endforeach

        </select>
        <div id="msjValidacion_Rol" class="invalid-feedback">
            Escoja un propietario.
        </div>

    </div>
    <div class="col-md-6 py-2 has-validation">
        <label for="placa" class="form-label">Placa</label>
        <input id="placa" name="placa" type="text" class="form-control" aria-describedby="msjValidacion_Nombre" tabindex="1" required>
        <div id="msjValidacion_Nombre" class="invalid-feedback">
            ¡El vehículo ya se encuentra registrado!
        </div>
    </div>



    <div class="col-md-6 py-2">
        <label for="" class="form-label">Marca</label>
        <input id="marca" name="marca" type="text" class="form-control" tabindex="2" required>
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Modelo</label>
        <input id="modelo" name="modelo" type="text" class="form-control" tabindex="3" required>
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Tipo</label>
        <input id="tipo" name="tipo" type="text" class="form-control" tabindex="4">
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Año</label>
        <input id="anio" name="anio" type="number" min="1900" max="2023" class="form-control" tabindex="5" required>
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Color</label>
        <input id="color" name="color" type="text" class="form-control" tabindex="6" required>
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Descripción</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="7">
    </div>

    <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="8">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="submitbutton" tabindex="9">Guardar</button>
    </div>

</form>


@endsection

<script>
    $(document).on('keyup', '#placa', function(event) {
        event.preventDefault();
        var placa = document.getElementById('placa').value;
        var href = 'vehiculos/' + placa + '/getByPlaca';
        $.ajax({
            url: href,
            type: "GET",
            data: JSON,
            success: function(datos) {
                let input = document.getElementById("placa");
                let button = document.getElementById("submitbutton");
                if (datos === '') {
                    input.classList.add("is-valid");
                    button.removeAttribute('disabled', '');
                } else {
                    input.classList.add("is-invalid");
                    button.setAttribute('disabled', '');
                }
                console.log(datos);
            }
        })
    });
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