@extends('main.main')

@section ('css')
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">Orden de Compra</h1>
    <a href="compras/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Nueva Orden de Compra</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Compra</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="tbl_ordenAtencion" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Numero de documento compra</th>
                        <th>Numero de producto</th>
                        <th>Producto</th>
                        <th>Numero de serie de parte</th>
                        <th>Cantidad</th>
                        <th>Costo Unitario</th>
                        <th>Impuestos</th>
                        <th>Total</th>
                        <th>-</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($compras as $compra)
                    <tr>
                        <!-- <td scope="row">{{$compra->Codigo}}</td> -->
                        <td>{{$compra->DocumentoCompraId}}</td>
                        <td>{{$compra->ProductoId}}</td>
                        <td>{{$compra->Producto}}</td>
                        <td>{{$compra->NumeroSerieParte}}</td>
                        <td>{{$compra->Cantidad}}</td>
                        <td>{{"$ " . number_format( $compra->CostoUnitario, 2, '.', ',')}}</td>
                        <td>{{$compra->Impuestos}}</td>
                        <td>{{"$ " . number_format( $compra->Total, 2, '.', ',')}}</td>

                        <td>
                            <a class="d-none d-sm-inline-block btn btn-sm btn-primary" data-toggle="modal" id="mediumButton" data-target="#mediumModal" data-attr="productos/{{ $producto->id}}/edit/"><i class="fas fa-edit fa-sm text-white-50"></i></a>
                            <a class="d-none d-sm-inline-block btn btn-sm btn-danger" data-toggle="modal" id="mediumButton" data-target="#mediumModal" data-attr="productos/{{$producto->id}}/del/"><i class="fas fa-times-circle fa-sm text-white-50"></i></a>
                        </td>
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