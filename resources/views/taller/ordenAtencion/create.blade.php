@extends('main.main')


<!-- <h6 class="m-0 font-weight-bold text-primary">Nueva Orden de Atencion</h6> -->




@section('contenido')
<!-- Page Heading
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800"> <b> Nueva Orden de Atencion </b> - Nº 2022ODA-0004</h1>
</div> -->

<!-- <form action="ordenAtencion" class="row g-3 needs-validation" novalidate method="post">
    @csrf
    <div class="col-md-6 py-2">
        <label for="" class="form-label">Numero ODA</label>
        <input id="numero" name="numero" type="number" class="form-control" tabindex="1" required>
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Fecha de ingreso</label>
        <input id="fecha" name="fecha" type="date" class="form-control" tabindex="2" required value="">
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Documento</label>
        <input id="documento" name="documento" type="text" class="form-control" tabindex="3" required>
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Cliente</label>
        <input id="cliente" name="cliente" type="text" class="form-control" tabindex="4">
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Teléfono</label>
        <input id="telefono" name="telefono" type="text" class="form-control" tabindex="5">
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Dirección</label>
        <input id="direccion" name="direccion" type="direccion" class="form-control" tabindex="6">
    </div>

    <div class="col-md-6 py-2">
        <label for="" class="form-label">Email</label>
        <input id="email" name="email" type="email" class="form-control" tabindex="7">
    </div>

    <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="7">Cerrar</button>
        <button type="submit" class="btn btn-primary" tabindex="8">Guardar</button>
    </div>

</form> -->



<form class="user">
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-7">
                    <h5 class="card-title"> <b> Nueva Orden de Atencion </b> - Nº 2022ODA-0004</h5>
                </div>
                <div class="col-5">
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
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="form-group">
                        <h5 class="modal-title">Datos del cliente</h5>
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por nombres o DNI..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                        <textarea class="form-control" name="datosCliente" id="datosCliente" cols="50" rows="4" placeholder="Datos del cliente..."></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <h5 class="modal-title">Datos del Vehículo</h5>
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por placa..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                        <textarea class="form-control" name="datosVehiculo" id="datosVehiculo" cols="50" rows="4" placeholder="Datos del vehículo..."></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <h5 class="modal-title">Atención</h5> <br>
                        <div class="form-group">
                            <div class="text-left" style="margin-left: 20px; align-self:center;">
                                <label>Estado: </label>
                            </div>
                            <div class="col-sm-8">
                                <select class="form-select" name="estado" id="estado">
                                    <option value="0" disabled selected>Seleccione una opcion...</option>
                                    <option value="En espera">En espera</option>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="En proceso">En proceso</option>
                                    <option value="Atendido">Atendido</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="text-left" style="margin-left: 20px; align-self:center;">
                                <label>Mecánico disponible: </label>
                            </div>
                            <div class="col-sm-8">
                                <select class="form-select" name="estado" id="estado">
                                    <option value="0" disabled selected>Seleccione una opcion...</option>
                                    <option value="Carlos Piguave">Carlos Piguave</option>
                                    <option value="Marcos Mite">Marcos Mite</option>
                                    <option value="Juan Cruz">Juan Cruz</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <h5 class="modal-title">Tipo de servicio</h5>
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                            <textarea class="form-control" name="tipoServicio" id="tipoServicio" cols="50" rows="4" placeholder="Detalles del tipo de servicio solicitado..."></textarea>
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