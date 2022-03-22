@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Nueva Categoría</h6>
@endsection

@section('contenido')

<form class="row g-3 needs-validation" novalidate action="proveedores" method="post">
    @csrf
    <div class="col-md-12">
        <div class="col-sm-6  has-validation" style="padding:0">
            <label for="txtDNI" class="form-label">DNI</label>
            <input id="txtDNI" name="txtDNI" class="form-control" maxlength="13" type="number" aria-describedby="msjValidacion_Nombre" tabindex="1" required>
            <div id="msjValidacion_Nombre" class="invalid-feedback">
                El proveedor ya se encuentra registrado!
            </div>
        </div>

    </div>

    <div class="col-md-6 py-2">
        <label for="txtNombre" class="form-label">Nombre</label>
        <input id="txtNombre" name="txtNombre" type="text" class="form-control" maxlength="20" tabindex="2" required>
    </div>

    <div class="col-md-6 py-2">
        <label for="txtApellido" class="form-label">Apellido</label>
        <input id="txtApellido" name="txtApellido" type="text" class="form-control" maxlength="20" tabindex="3">
    </div>
    <div class="col-md-6 py-2">
        <label for="txtTelefono" class="form-label">Teléfono</label>
        <input id="txtTelefono" name="txtTelefono" type="number" class="form-control" maxlength="20" tabindex="5">
    </div>

    <div class="col-md-6 py-2">
        <label for="txtEmail" class="form-label">Email</label>
        <input id="txtEmail" name="txtEmail" type="email" class="form-control" maxlength="25" tabindex="6" required>
    </div>

    <div class="col-md-12 py-2">
        <label for="txtDireccion" class="form-label">Dirección</label>
        <input id="txtDireccion" name="txtDireccion" type="text" maxlength="125" class="form-control" tabindex="4" required>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="7">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="submitbutton" tabindex="8">Guardar</button>
    </div>

    <script>
        // $("txtDNI").validarCedulaEC();
        $(document).on('keyup', '#txtDNI', function(event) {
            event.preventDefault();
            let dni = document.getElementById('txtDNI').value;
            let href = 'proveedores/' + dni + '/getByDNI';
            $.ajax({
                url: href,
                type: "GET",
                data: JSON,
                // contentType: false,
                // processData: false,
                success: function(datos) {
                    let input = document.getElementById("txtDNI");
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
</form>

@endsection