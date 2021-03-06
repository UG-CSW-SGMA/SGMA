@extends('main.main')

@section ('css')
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">Vehículos</h1>
    <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" id="mediumButton" data-target="#mediumModal" data-attr="vehiculos/create" title="Crear Nuevo Vehículo"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Nuevo Vehículo</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Registro</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="tbl_vehiculos" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Placa</th>
                        <th>Propietario</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Tipo</th>
                        <th>Año</th>
                        <th>Color</th>
                        <th>Descripción</th>
                        <th>-</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach($vehiculos as $vehiculo)
                    <tr>
                        <td>{{$vehiculo->Placa}}</td>
                        <td>{{$vehiculo->Nombre}} {{$vehiculo->Apellido}}</td>
                        <td>{{$vehiculo->Marca}}</td>
                        <td>{{$vehiculo->Modelo}}</td>
                        <td>{{$vehiculo->Tipo}}</td>
                        <td>{{$vehiculo->Anio}}</td>
                        <td>{{$vehiculo->Color}}</td>
                        <td>{{$vehiculo->Descripcion}}</td>
                        <td>

                            <a class="d-none d-sm-inline-block btn btn-sm btn-primary" data-toggle="modal" id="mediumButton" data-target="#mediumModal" data-attr="vehiculos/{{$vehiculo->id}}/edit/"><i class="fas fa-edit fa-sm text-white-50"></i></a>

                            <form action="{{route('vehiculos.destroy',$vehiculo->id)}}" method="POST" class="d-inline formulario-eliminar">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm bg-gradient-danger"><i class="fas fa-times-circle fa-sm text-white-50 bg-gradient-danger"></i></button>
                            </form>
           
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="mediumBody">

        </div>
    </div>
</div>

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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('eliminar')== 'ok')
<script>
    Swal.fire(
        'Eliminado!',
        'El registro fue eliminado con éxito.',
        'success'
    )
</script>
@endif

@if (session('guardar')== 'ok')
<script>
    Swal.fire(
        'Guardado!',
        'El registro fue guardado con éxito.',
        'success'
    )
</script>
@endif
@if (session('actualizar')== 'ok')
<script>
    Swal.fire(
        'Actualizado!',
        'El registro fue actualizado con éxito.',
        'success'
    )
</script>
@endif

@if (session('actualizar')== 'failed')
<script>
    Swal.fire(
        'Error!',
        'El registro NO fue actualizado con éxito.',
        'error'
    )
</script>
@endif

<script>
    $('.formulario-eliminar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Está seguro de eliminar?',
            text: "El registro se eliminará definitivamente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    })
</script>



<script>
    $(document).ready(function() {
        var table = $('#tbl_vehiculos').DataTable({
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