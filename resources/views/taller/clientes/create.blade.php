@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Nuevo Cliente</h6>
@endsection


@section('contenido')

<form action="clientes" method="post">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">DNI</label>
        <input id="dni" name="dni" type="text" class="form-control" tabindex="1" required>
        <h6 id="mensaje" style="color: red;"></h6>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" tabindex="2" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Apellido</label>
        <input id="apellido" name="apellido" type="text" class="form-control" tabindex="3" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Dirección</label>
        <input id="direccion" name="direccion" type="text" class="form-control" tabindex="4">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Teléfono</label>
        <input id="telefono" name="telefono" type="text" class="form-control" tabindex="5">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input id="email" name="email" type="email" class="form-control" tabindex="6">
    </div>

    <div class="modal-footer">
       
        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="7">Cerrar</button>
        <button type="submit" class="btn btn-primary" tabindex="8">Guardar</button>
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
            // contentType: false,
            // processData: false,
            success: function(datos) {
                console.log(datos);
                var nombre = document.getElementById('nombre');
                var apellido = document.getElementById('apellido');
                var direccion = document.getElementById('direccion');
                var telefono = document.getElementById('telefono');
                var email = document.getElementById('email');
                var mensaje = document.getElementById('mensaje');
                
                if (datos == null) {
                    nombre.disabled = true;
                    apellido.disabled = true;
                    direccion.disabled = true;
                    telefono.disabled = true;
                    email.disabled = true;
                    mensaje.innerHTML = 'Cliente ya existe';
                    
                } else {
                    nombre.disabled = false;
                    apellido.disabled = false;
                    direccion.disabled = false;
                    telefono.disabled = false;
                    email.disabled = false;
                    mensaje.innerHTML = '';
                }
            }
        })
    });
</script>