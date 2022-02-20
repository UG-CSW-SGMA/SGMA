@extends('main.main')

@section('contenido')
<!-- Page Heading -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Categorías</h6>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newClientModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Nueva Categoría</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcón</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articulos as $articulo)
                    <tr>
                        <td>{{$articulo->Nombre}}</td>
                        <td>{{$articulo->Descripcion}}</td>
                        <td>
                            <a href="#" class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i></a>
                            <a href="#" class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm bg-gradient-danger"><i class="fas fa-times-circle fa-sm text-white-50 bg-gradient-danger"></i></a>
                        </td>
                        @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection