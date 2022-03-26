@extends('main.main')

@section ('css')
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')

<form action="/ordenAtencion" class="row g-3 needs-validation" novalidate method="post">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title"> <b> Nueva Orden de Atencion </b> </h4>
                    <h5> Nº {{$numOrden}}</h5>
                    <input type="hidden" name="numeroOrden" value="{{$numOrden}}">
                </div>
                <div class="col-4">
                    <div class="col text-left">
                        <label class="label-control">Fecha/hora de ingreso</label>
                    </div>
                    <div class="col">
                        <input type="datetime-local" class="form-control" id="fecha" name="fechaIngreso" placeholder="fecha">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <h5 class="title mb-3">Datos del Vehículo</h5>
                        <div class="input-group mb-3">
                            <input type="text" id="buscarPlaca" class="form-control bg-light border-0 small" placeholder="Buscar por placa..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" id="buscarVehiculo" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 mb-2 text-end">
                                <label class="col-form-label">Placa</label>
                            </div>
                            <div class="col-9 mb-2">
                                <input type="hidden" name="vehiculoId" id="idVehiculo">
                                <input class="form-control" id="placa" name="placa" readonly type="text" maxlength="10">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3 mb-2 text-end">
                                <label class="col-form-label">Descripción</label>
                            </div>
                            <div class="col-9 mb-2">
                                <input class="form-control" id="descripcionV" name="vehiculo" readonly type="text">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3 mb-2 text-end">
                                <label class="col-form-label">Kilometraje</label>
                            </div>
                            <div class="col-9 mb-2">
                                <input class="form-control" type="number" name="kilometraje" max="99999999" maxlength="8">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="form-group">
                        <h5 class="title">Datos del cliente</h5>
                        <input type="hidden" name="clienteId" id="clienteId">
                        <div class="row">
                            <div class="col-sm-3 mb-2 text-end">
                                <label class="col-form-label">DNI</label>
                            </div>
                            <div class="col-sm-9 mb-2">
                                <input class="form-control" readonly type="number" maxlength="10" name="dni" id="dni">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3 mb-2 text-end">
                                <label class="col-form-label">Nombres</label>
                            </div>
                            <div class="col-sm-9 mb-2">
                                <input class="form-control" readonly type="text" name="cliente" id="cliente">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-3 mb-2 text-end">
                                <label class="col-form-label">Email</label>
                            </div>
                            <div class="col-sm-9 mb-2">
                                <input class="form-control" readonly type="email" id="emailCliente">
                            </div>
                        </div>

                        <textarea class="form-control" name="observacines" id="observaciones" cols="50" rows="3" placeholder="Observaciones en la recepción del vehículo..."></textarea>
                    </div>
                </div>

            </div>
            <hr>

            <div class="row">
                <div class="col-sm-6 mb-sm-0">
                    <h5 class="title">Atención</h5> <br>
                    <div class="row">

                        <div class="col-sm-3 mb-2 text-end">
                            <label class="col-form-label">Estado: </label>
                        </div>
                        <div class="col-sm-9 mb-2">
                            <select class="form-select" name="estadoODA" id="estado">
                                <option value="0" disabled selected>Seleccione una opcion...</option>
                                <option value="1">Activo</option>
                                <option value="2">En Atención</option>
                                <option value="3">Cerrado</option>
                                <option value="4">No Atendido</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-end">
                            <label class="col-form-label">Mecánico disponible: </label>
                        </div>
                        <div class="col-sm-9 mb-2">
                            <select class="form-select" name="mecanicoId" id="mecanico">
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
                        <!-- <div class="input-group mb-2">

                            <input type="text" id="buscarServicio" class="form-control bg-light border-0 small" placeholder="Buscar por..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" id="buscarTipoServicio" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                        <textarea class="form-control" readonly name="tipoServicio" id="tipoServicio" cols="50" rows="4" placeholder="Detalles del tipo de servicio solicitado..."></textarea> -->
                        <select class="form-select" name="tipoServicioId" id="tipoServicio">
                            <option value="0" disabled selected>Seleccione una opcion...</option>
                            @foreach($tipoServicios as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->Nombre}}</option>
                            @endforeach

                        </select>
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
    // ajax de busqueda de vehiculos
    $(document).on('click', '#buscarVehiculo', function(event) {
        event.preventDefault();
        var placa = document.getElementById('buscarPlaca').value;
        var href = '/vehiculos/' + placa + '/getByPlaca';
        $.ajax({
            url: href,
            type: "GET",
            data: JSON,
            success: function(datos) {
                if (datos == '') {
                    Swal.fire(
                        'Error!',
                        'El registro NO existe en la base de datos.',
                        'error'
                    )
                } else {
                    let idVehiculo = document.getElementById("idVehiculo");
                    let placa = document.getElementById("placa");
                    let vehiculo = document.getElementById("descripcionV");
                    let clienteId = document.getElementById("clienteId");
                    let cliente = document.getElementById("cliente");
                    let dni = document.getElementById("dni");
                    let emailCliente = document.getElementById("emailCliente");

                    idVehiculo.value = datos.id;
                    placa.value = datos.Placa;
                    vehiculo.value = datos.Marca + ' ' + datos.Modelo + ' ' + datos.Descripcion + ' ' + datos.Anio + ' ' + datos.Tipo;
                    clienteId.value = datos.SujetoId;
                    cliente.value = datos.Nombre + ' ' + datos.Apellido;
                    dni.value = datos.DNI;
                    emailCliente.value = datos.Email;
                    console.log(datos);
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus);
                alert("Error: " + errorThrown);
            }
        })
    });

    //Método javascript que devuelve la fecha actual del sistema local

    $(document).ready(function() {

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        var hh = today.getHours();
        var m = today.getMinutes();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        if (hh < 10) {
            hh = '0' + hh
        }

        if (m < 10) {
            m = '0' + m
        }

        today = yyyy + '-' + mm + '-' + dd + 'T' + hh + ':' + m;
        console.log(today);
        document.getElementById("fecha").setAttribute("value", today);
    });
</script>


@endsection