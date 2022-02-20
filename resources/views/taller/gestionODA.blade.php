@extends('main.main')

@section('contenido')


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">Orden de atención</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newOrderModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Nueva Orden de Atención</a>
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
                        <th>Nº ODA</th>
                        <th>Fecha ingreso</th>
                        <th>Documento</th>
                        <th>Cliente</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Correo</th>
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
                        <td>2022ODA-0001</td>
                        <td>2022/01/04</td>
                        <td>0927304220</td>
                        <td>Tiger Nixon</td>
                        <td>0994915345</td>
                        <td>8va. y M. Angel Silva</td>
                        <td>tiger@dominio.com</td>
                        <td><a href="#" class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i></a>
                            <a href="#" class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm bg-gradient-danger"><i class="fas fa-times-circle fa-sm text-white-50 bg-gradient-danger"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2022ODA-0002</td>
                        <td>2022/01/12</td>
                        <td>1276839475</td>
                        <td>Garrett Winters</td>
                        <td>0995637485</td>
                        <td>Tokyo</td>
                        <td>garrett@hotmail.com</td>
                        <td><a href="#" class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i></a>
                            <a href="#" class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm bg-gradient-danger"><i class="fas fa-times-circle fa-sm text-white-50 bg-gradient-danger"></i></a>
                        </td>

                    </tr>
                    <tr>
                        <td>2022ODA-0003</td>
                        <td>2022/01/22</td>
                        <td>0378462785</td>
                        <td>Ashton Cox</td>
                        <td>0996578364</td>
                        <td>San Francisco</td>
                        <td>ashton@gmail.com</td>
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