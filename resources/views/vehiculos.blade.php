@extends('vistapadre')

@section('contenido')


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">Vehículos</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newCarModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Nuevo Vehículo</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Registro</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Placa</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Tipo</th>
                        <th>Color</th>
                        <th>Kilometraje</th>
                        <th>-</th>

                    </tr>
                </thead>
                <!--<tfoot>
                                        <tr>
                                            <th>Nº</th>
                                            <th>Fecha ingreso</th>
                                            <th>Documento</th>
                                            <th>Cliente</th>
                                            <th>Teléfono</th>
                                            <th>Dirección</th>
                                        </tr>
                                    </tfoot> -->
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>GRD0283</td>
                        <td>Toyota</td>
                        <td>Hilux 2.7cc 4X2</td>
                        <td>2008</td>
                        <td>Camioneta</td>
                        <td>Blanco</td>
                        <td>250.876 Km</td>
                        <td><a href="#" class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i></a>
                            <a href="#" class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm bg-gradient-danger"><i class="fas fa-times-circle fa-sm text-white-50 bg-gradient-danger"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>GSN3749</td>
                        <td>Dong Feng DFSK</td>
                        <td>Fun Van K07ii 1.3 cc</td>
                        <td>2015</td>
                        <td>Furgoneta</td>
                        <td>Negro</td>
                        <td>142.263 Km</td>
                        <td><a href="#" class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i></a>
                            <a href="#" class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm bg-gradient-danger"><i class="fas fa-times-circle fa-sm text-white-50 bg-gradient-danger"></i></a>
                        </td>

                    </tr>
                    <tr>
                        <td>3</td>
                        <td>GPG0152</td>
                        <td>Chevrolet</td>
                        <td>Corsa Evolution 1.4 cc</td>
                        <td>2007</td>
                        <td>Sedan</td>
                        <td>Plata</td>
                        <td>348.769 Km</td>
                        <td><a href="#" class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i></a>
                            <a href="#" class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm bg-gradient-danger"><i class="fas fa-times-circle fa-sm text-white-50 bg-gradient-danger"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection