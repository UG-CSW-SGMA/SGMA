@extends('main.main')

@section ('css')
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')

<!-- DataTable Show -->
<div class=" card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" id="mediumButton" data-target="#mediumModal" data-attr="usuarios/create" title="Crear un nuevo usuario"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Nuevo Usuario</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="tbl_usuarios" class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">Perfil</th>
                        <th scope="col">Nick</th>
                        <th scope="col">Usuario</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ \App\Enums\TipoRolEnum::getNombre($usuario->TipoRol) }}</td>
                        <td>{{$usuario->NickName}}</td>
                        <td>{{$usuario->NombreCompleto}}</td>
                        <td>
                            <a href="#" class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i></a>
                            <a href="#" class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm bg-gradient-danger"><i class="fas fa-times-circle fa-sm text-white-50 bg-gradient-danger"></i></a>
                        </td>
                        @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- small modal -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" id="smallBody">

        </div>
    </div>
</div>


<!-- medium modal -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="mediumBody">

        </div>
    </div>
</div>

<form id="formulario" class="form-registrar" enctype="multipart/form-data" action='{{url('/usuarios')}}' method ='POST' >
    @csrf
        <h4>Nuevo Usuario</h4>
        <div class="doble">
            <input required="" autocomplete="off" class="controls" type="number" id="TipoRol" name='TipoRol' placeholder="Ingrese el rol de usuario">
            <div class="input-group">-</div>
            <input required="" autocomplete="off" class="controls" type="text" name="NickName" id="NickName" placeholder="Ingrese su nickname o apodo">
            <input  required=""autocomplete="off" class="controls" type="email" name="Email" id="Email" placeholder="Ingrese su correo electrónico">
            <div class="input-group">-</div>
            <input required="" autocomplete="off" class="controls" type="text" name="NombreCompleto" id="NombreCompleto" placeholder="Ingrese su nombre completo">
            <div>
            <input required="" autocomplete="off" class="controls" type="password" name="PasswordSALT" id="PasswordSALT" placeholder="Ingrese su contraseña">
            <input required="" autocomplete="off" class="controls" type="password" name="PasswordHASH" id="PasswordHASH" placeholder="Ingrese su contraseña">
            </div>

            <div class="input-group">-</div>

            <select required="" id="selector" class="controlsOp" name="Activo">
            <option class="optionText" value="">Estado de usuario</option>
			<option class="optionText" value="Inactivo">0</option>
			<option class="optionText" value="Activo">1</option>
            </select>
            
        </div>
        <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a> <input required="" id="box" type="checkbox"></p>
        
        <input type="submit"  class="boton" value="Registrar Usuario">
       
        </form>
@endsection
@section ('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#tbl_usuarios').DataTable({
            lengthChange: false,
            buttons: {
                buttons: ['copy', 'csv', 'excel']
            },
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
        });

        table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
    });

    // display a modal (small modal)
    $(document).on('click', '#smallButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                //$('#smallModal').modal("show"); //Rafael1108 error si está disponible
                $('#smallBody').html(result).show();
            },
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });

    // display a modal (medium modal)
    $(document).on('click', '#mediumButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                //$('#mediumModal').modal("show"); //Rafael1108 error si está disponible
                $('#mediumBody').html(result).show();
            },
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });
</script>
@endsection