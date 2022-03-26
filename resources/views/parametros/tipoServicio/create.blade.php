@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Crear Servicio</h6>
@endsection

@section('contenido')
<form class="row g-3 needs-validation" novalidate action="servicios" method="post">
@csrf
    <div class="mb-3">
        <label for="txtNombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="txtNombre" name="txtNombre" maxlength="80" aria-describedby="msjValidacion_Nombre"  tabindex="1" required>
        <div id="msjValidacion_Nombre" class="invalid-feedback">
                ¡El servicio ya se encuentra registrado!
        </div>
    </div>

    <div class="mb-3">
        <label for="txtDescripcion" class="form-label">Descripcion</label>
        <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" maxlength="80" aria-describedby="msjValidacion_Descrip" tabindex="2" required>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="7">Cerrar</button>
        <button type="submit" class="btn btn-primary" tabindex="8">Guardar</button>
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