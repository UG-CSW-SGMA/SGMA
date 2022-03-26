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

                <a class="tile" data-toggle="modal" id="mediumButton" data-target="#mediumModal" data-attr="reportes/1">
                    <div class="tile-tittle">Log de Usuarios</div>
                    <div class="card-body text-center">
                        <div class="tile-icon">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-xl-3 col-md-6">

                <a class="tile" data-toggle="modal" id="mediumButton" data-target="#mediumModal" data-attr="reportes/2">
                    <div class="tile-tittle">Nuevos Clientes</div>
                    <div class="card-body text-center">
                        <div class="tile-icon">
                            <i class="fa fa-address-card" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>
            @if(Session('usuarioDataRol')==2|| Session('usuarioDataRol')==1 || Session('usuarioDataRol')==3)
            <div class="col-xl-3 col-md-6">

                <a class="tile" data-toggle="modal" id="mediumButton" data-target="#mediumModal" data-attr="reportes/3">
                    <div class="tile-tittle">Autopartes Vendidas</div>
                    <div class="card-body text-center">
                        <div class="tile-icon">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>
            @endif
            <div class="col-xl-3 col-md-6">
                @if(Session('usuarioDataRol')==3)
                <a class="tile" data-toggle="modal" id="mediumButton" data-target="#mediumModal" data-attr="reportes/4">
                    <div class="tile-tittle">Catálogo de Productos</div>
                    <div class="card-body text-center">
                        <div class="tile-icon">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
                @endif
            </div>
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
@endsection

@section ('js')

<script>
    // display a modal (medium modal)
    $(document).on('click', '#mediumButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            // return the result
            success: function(result, textStatus, XMLHttpRequest) {
                $('#mediumBody').html(result).show();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {

                $('#mediumBody').html('<div class="modal-header">Reportes</div><div class="modal-body"><div><h6 class="m-0 font-weight-bold text-primary text-center">Reporte no encontrado!</h6></div></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="7">ok</button>').show();
            },
            timeout: 8000
        })
    });
</script>


@endsection