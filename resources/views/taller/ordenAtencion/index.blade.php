@extends('main.main')

@section ('css')
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">Orden de atención</h1>
    <a href="ordenAtencion/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Nueva Orden de Atención</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Registro</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="tbl_ordenAtencion" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nº Orden</th>
                        <th>Fecha ingreso</th>
                        <th>Cliente</th>
                        <th>Placa</th>
                        <th>Vehiculo</th>
                        <th>Mecanico</th>
                        <th>Tipo Servicio</th>
                        <th>Estado</th>
                        <th>-</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach($ordenes as $oda)
                    <tr>
                        <td>{{$oda->NumeroTransaccion}}</td>
                        <td>{{$oda->FechaHora}}</td>
                        <td>{{$oda->Cliente}}</td>
                        <td>{{$oda->Placa}}</td>
                        <td>{{$oda->Vehiculo}}</td>
                        <td>{{$oda->Mecanico}}</td>
                        <td>{{$oda->TipoServicio}}</td>
                        <td>{{$oda->EstadoODA}}</td>
                        
                        <td><a href="#" class="d-none d-sm-inline btn btn-sm btn-info shadow-sm">
                        <!-- <i class="fa-solid fa-magnifying-glass-plus"></i> -->
                        <i class="fa-solid fa-eye"></i>
                     </a>
                            <!-- <a href="#" class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm bg-gradient-danger"><i class="fas fa-times-circle fa-sm text-white-50 bg-gradient-danger"></i></a> -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
<script src="https://kit.fontawesome.com/2008d37923.js" crossorigin="anonymous"></script>
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
        var table = $('#tbl_ordenAtencion').DataTable({
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
</script>
@endsection