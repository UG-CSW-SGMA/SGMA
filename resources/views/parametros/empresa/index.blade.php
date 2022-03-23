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
            <h6 class="m-0 font-weight-bold text-primary">Empresa</h6>
        </div>
    </div>
    <div class="card-body">
        <form class="row g-3 needs-validation" action="empresa/{{$emp->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <div class="col-sm-6  has-validation" style="padding:0">
                    <label for="txtRUC" class="form-label">RUC</label>
                    <input id="txtRUC" name="txtRUC" class="form-control" maxlength="13" type="number" aria-describedby="msjValidacion_Nombre" tabindex="1" value="{{$emp->RUC}}" disabled>
                </div>

            </div>

            <div class="col-md-6 py-2">
                <label for="txtNEmpresa" class="form-label">Empresa</label>
                <input id="txtNEmpresa" name="txtNEmpresa" type="text" maxlength="20" class="form-control" tabindex="2" required value=" {{$emp->RazonSocial}}">
            </div>

            <div class="col-md-6 py-2">
                <label for="txtNComercial" class="form-label">Nombre Comercial</label>
                <input id="txtNComercial" name="txtNComercial" type="text" class="form-control" maxlength="20" tabindex="3" value=" {{$emp->NombreComercial}}">
            </div>

            <div class="col-md-12 py-2">
                <label for="txtDireccion" class="form-label">Dirección</label>
                <input id="txtDireccion" name="txtDireccion" type="text" maxlength="125" class="form-control" tabindex="4" required value=" {{$emp->Direccion }}">
            </div>

            <div>
                <button type="submit" class="btn btn-primary" tabindex="5">Actualizar</button>
            </div>
        </form>
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

@if (session('actualizar')== 'failed')
<script>
    Swal.fire(
        'Error!',
        'El registro NO fue actualizado con éxito.',
        'error'
    )
</script>
@endif

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>

@endsection