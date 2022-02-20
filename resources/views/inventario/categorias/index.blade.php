@extends('main.main')

@section ('css')
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')
<!-- Page Heading -->
<!-- DataTales Example -->
<div class=" card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Categorías</h6>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newClientModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Nueva Categoría</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="tbl_categorias" class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">Tipo Servicio</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articulos as $articulo)
                    <tr>
                        <td>{{$articulo->TipoServicioNombre}}</td>
                        <td>{{$articulo->Nombre}}</td>
                        <td>{{$articulo->Descripcion}}</td>
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
        var table = $('#tbl_categorias').DataTable({
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