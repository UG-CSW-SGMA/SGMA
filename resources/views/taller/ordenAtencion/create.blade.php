@extends('main.main')

@section ('css')
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')

<form>
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title"> <b> Nueva Orden de Atencion </b> </h4>
                    <h5> Nº 2022ODA-0004</h5>
                </div>
                <div class="col-4">
                    <div class="col text-left">
                        <label class="label-control">Fecha/hora de ingreso</label>
                    </div>
                    <div class="col">
                        <input type="datetime-local" class="form-control" id="fecha" placeholder="fecha">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <h5 class="title">Datos del Vehículo</h5>
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por placa..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                        <textarea class="form-control" readonly name="datosVehiculo" id="datosVehiculo" cols="50" rows="4" placeholder="Datos del vehículo..."></textarea>
                    </div>
                </div>
                <div class="col text-left">
                        <label class="label-control">Kilometraje</label>
                        <input class="form-control" type="number" max="99999999" maxlength="8">
                    </div>

                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="form-group">
                        <h5 class="title">Datos del cliente</h5>
                        <!-- <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por nombres o DNI..." aria-label="Search" aria-describedby="basic-addon2">                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div> -->
                        <textarea class="form-control" readonly name="datosCliente" id="datosCliente" cols="50" rows="4" placeholder="Datos del cliente..."></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <h5 class="title">Atención</h5> <br>
                        <div class="form-group">
                            <div class="text-left" style="margin-left: 20px; align-self:center;">
                                <label>Estado: </label>
                            </div>
                            <div class="col-sm-8">
                                <select class="form-select" name="estado" id="estado">
                                    <option value="0" disabled selected>Seleccione una opcion...</option>
                                    <option value="1">Activo</option>
                                    <option value="2">En Atención</option>
                                    <option value="3">Cerrado</option>
                                    <option value="4">No Atendido</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="text-left" style="margin-left: 20px; align-self:center;">
                                <label>Mecánico disponible: </label>
                            </div>
                            <div class="col-sm-8">
                                <select class="form-select" name="mecanico" id="mecanico">
                                    <option value="0" disabled selected>Seleccione una opcion...</option>
                                    @foreach($mecanicos as $mecanico)
                                    <option value="{{$mecanico->id}}">{{$mecanico->NombreCompleto}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <h5 class="title">Tipo de servicio</h5>
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                            <textarea class="form-control" readonly name="tipoServicio" id="tipoServicio" cols="50" rows="4" placeholder="Detalles del tipo de servicio solicitado..."></textarea>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-secondary" type="submit" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary" type="submit" data-dismiss="modal">Guardar</button>
        </div>
    </div>
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


@endsection