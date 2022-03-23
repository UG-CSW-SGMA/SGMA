@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Nuevo Cliente</h6>
@endsection


@section('contenido')

<form action="clientes" class="row g-3 needs-validation" novalidate method="post">

    @csrf
    <div class="col-md-12">
        <div class="col-sm-6  has-validation" style="padding:0">
            <label for="dni" class="form-label">DNI</label>
            <input id="dni" name="dni" type="number" maxlength="13" class="form-control" aria-describedby="msjValidacion_Nombre" tabindex="1" required>
            <div id="msjValidacion_Nombre" class="invalid-feedback">
                ¡El cliente ya se encuentra registrado!
            </div>
        </div>
    </div>

    <div class="col-md-6 py-2">
        <label for="nombre" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" maxlength="20" tabindex="2" required>
    </div>

    <div class="col-md-6 py-2">
        <label for="apellido" class="form-label">Apellido</label>
        <input id="apellido" name="apellido" type="text" class="form-control" tabindex="3" required>
    </div>

    <div class="col-md-6 py-2">
        <label for="telefono" class="form-label">Teléfono</label>
        <input id="telefono" name="telefono" type="number" maxlength="20" class="form-control" tabindex="4">
    </div>

    <div class="col-md-6 py-2">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email" type="email" class="form-control" tabindex="5">
    </div>

    <div class="col-md-12 py-2">
        <label for="direccion" class="form-label">Dirección</label>
        <input id="direccion" name="direccion" type="text" class="form-control" tabindex="6">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="7">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="submitbutton" tabindex="8">Guardar</button>
    </div>

</form>


@endsection



<script>
    $(document).on('keyup', '#dni', function(event) {
        event.preventDefault();
        var dni = document.getElementById('dni').value;
        var href = 'clientes/' + dni + '/getByDNI';
        $.ajax({
            url: href,
            type: "GET",
            data: JSON,
            success: function(datos) {
                let input = document.getElementById("dni");
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