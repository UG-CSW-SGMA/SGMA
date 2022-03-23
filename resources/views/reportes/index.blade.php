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
            <h6 class="m-0 font-weight-bold text-primary">Reportes</h6>
        </div>
    </div>
    <div class="card-body">
        <div class="row row-cols-1 row-cols-md-2 g-4 tile-container">
            <div class="col-xl-3 col-md-6">

                <a class="tile" href="/productos">
                    <div class="tile-tittle">Log de Usuarios</div>
                    <div class="card-body text-center">
                        <div class="tile-icon">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">

                <a class="tile" href="/categorias">
                    <div class="tile-tittle">Categorías</div>
                    <div class="card-body text-center">
                        <div class="tile-icon">
                            <i class="fa fa-tags" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>



        </div>
    </div>
</div>
@endsection

@section ('js')
@if (session('actualizar')== 'ok')
<script>
    Swal.fire(
        'Actualizado!',
        'El registro fue actualizado con éxito.',
        'success'
    )
</script>
@endif


@endsection