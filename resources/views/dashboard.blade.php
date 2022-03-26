@extends('main.main')

@section('contenido')

<div class="container-fluid px-4">

    <div class="row row-cols-1 row-cols-md-2 g-4 tile-container">
        @if(Session('usuarioDataRol')==3 || Session('usuarioDataRol')==2 )
        <div class="col-xl-3 col-md-6">

            <a class="tile" href="/productos">
                <div class="tile-tittle">Productos</div>
                <div class="card-body text-center">
                    <div class="tile-icon">
                        <i class="fa fa-archive" aria-hidden="true"></i>
                    </div>
                </div>
            </a>
        </div>
        @endif


        <div class="col-xl-3 col-md-6">

            <a class="tile" href="/categorias">
                <div class="tile-tittle">Categorías</div>
                <div class="card-body text-center">
                    <div class="tile-icon">
                        <i class="fa fa-tags" aria-hidden="true"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6">

            <a class="tile" href="/proveedores">
                <div class="tile-tittle">Proveedores</div>
                <div class="card-body text-center">
                    <div class="tile-icon">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                    </div>
                </div>
            </a>
        </div>

        @if(Session('usuarioDataRol')==4 || Session('usuarioDataRol')==1)
        <div class="col-xl-3 col-md-6">
           
            <a class="tile" href="/ordenAtencion">
                <div class="tile-tittle">Gestión ODA</div>
                <div class="card-body text-center">
                    <div class="tile-icon">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                    </div>
                </div>
            </a>
        </div>
        @endif
        @if(Session('usuarioDataRol')==3)
        <div class="col-xl-3 col-md-6">

            <a class="tile" href="/clientes">
                <div class="tile-tittle">Clientes</div>
                <div class="card-body text-center">
                    <div class="tile-icon">
                        <i class="fa fa-address-card" aria-hidden="true"></i>
                    </div>
                </div>
            </a>
        </div>
        @endif
        @if(Session('usuarioDataRol')==3)
        <div class="col-xl-3 col-md-6">

            <a class="tile" href="/vehiculos">
                <div class="tile-tittle">Vehículos</div>
                <div class="card-body text-center">
                    <div class="tile-icon">
                        <i class="fa fa-car" aria-hidden="true"></i>
                    </div>
                </div>
            </a>
        </div>
        @endif

        <div class="col-xl-3 col-md-6">

            <a class="tile" href="compras">
                <div class="tile-tittle">Compras</div>
                <div class="card-body text-center">
                    <div class="tile-icon">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    </div>
                </div>
            </a>
        </div>


    </div>
</div>

<a class="sidebar-brand d-flex align-items-center justify-content-center">
    <div class="sidebar-brand-icon">
        <i class="fa fa-taxi"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SGMA <sub>v1.0</sub></div>
</a>
@endsection