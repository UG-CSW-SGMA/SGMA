@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Reporte Nuevos Clientes</h6>
@endsection

@section('contenido')

<form action="reportes/2/showReport" method="POST">
    @csrf

    <div class="card text-center">
        <div class="card-header ">

            <div class="form-check form-switch text-right px-2">
                <input class="form-check-input" type="checkbox" id="checkRangos" name="checkRangos">
                <label class="form-check-label" for="checkRangos">Usar rangos</label>
            </div>
        </div>
        <div class="card-body">
            <div class="row mx-5 " id="mes">
                <label class="label-control py-2">Mes y Año</label>
                <div class="input-group col-md-12 py-2">
                    <input type="month" class="form-control" id="dtMesAnio" name="dtMesAnio" placeholder="fecha">
                </div>
            </div>
            <div class="row mx-5" style="display: none;" id="rango">
                <label class="label-control py-2">Rangos</label>
                <div class="input-group col-md-12 py-2">
                    <span class="input-group-text  label-control">Desde: </span>
                    <input type="date" class="form-control " id="dtDesde" name="dtDesde" placeholder="fecha">
                </div>

                <div class="input-group col-md-12  py-2">
                    <span class="input-group-text label-control">Hasta: </span>
                    <input type="date" class="form-control" id="dtHasta" name="dtHasta" placeholder="fecha">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer text-muted">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="7">Cerrar</button>
        <button type="submit" class="btn btn-primary" tabindex="8">Descargar</button>

    </div>
</form>
<script>
    $(document).ready(function() {
        var today = new Date();

        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();

        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }

        document.getElementById("dtMesAnio").setAttribute("value", yyyy + '-' + mm);
        document.getElementById("dtDesde").setAttribute("value", yyyy + '-' + mm + '-01');
        document.getElementById("dtHasta").setAttribute("value", yyyy + '-' + mm + '-' + dd);
    });

    $(document).on('change', '#checkRangos', function(event) {
        mes = document.getElementById("mes");
        rangos = document.getElementById("rango");
        check = document.getElementById("checkRangos");
        if (check.checked) {
            mes.style.display = 'none';
            rangos.style.display = 'block';
        } else {
            mes.style.display = 'block';
            rangos.style.display = 'none';
        }
    });
</script>
@endsection