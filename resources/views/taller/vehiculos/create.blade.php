@extends('main.main')

@section ('css')
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')

<div class="modal fade bd-example-modal" id="modalmantenimiento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">


            <div class="modal-header">
                <h5 class="modal-title" id="mdltitulo"></h5>

                <button class="modal-close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <form class="user" method="POST" id="producto_form">
                    <input type="hidden" name="prod_id" id="prod_id">

                    <div class="form-group">
                        <label class="form-label" for="prod_nom">Nombre</label>
                        <input type="text" class="form-control form-control-user" id="prod_nom" name="prod_nom" placeholder="Ingrese nombre" required>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" name="action" id="#" value="add" data-dismiss="modal">Guardar</button>
            </div>

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

@endsection