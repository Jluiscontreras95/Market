@extends('layouts.admin')
@section('title','libro contable')
@section('styles')

    <style type="text/css">
        .unstyled-button {
            border: none;
            padding: 0;
            background: none;
        }
    </style>

@endsection
@section('create')

    <li class="nav-item d-none d-lg-flex">
        <a class="nav-link" href="{{route('purchases.create')}}">
            <span class="btn btn-primary">+ Registrar compra</span>
        </a>
    </li>

@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Libro contable</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Libro contable</li>
                </ol>
            </nav>
        </div>

         <div class="row">
           <!-- @foreach ($totales_generales as $total_general)
                <div class="col-md-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Fondos Disponibles</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">Bs. {{$total_general->total}}</h2>
                                    </div>
                                    <small class="text-gray">Los fondos disponibles(Compras/Ventas)</small>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-university icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach -->
        
            @foreach ($totales_activos as $total_activo)
                <div class="col-md-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Fondos Disponibles</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">Bs. {{$total_activo->total}}</h2>
                                    </div>
                                    <small class="text-gray">Los fondos disponibles(Compras/Ventas), Solo Activos declarados</small>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-university text-success icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($totales_desactivos as $total_desactivo)
                <div class="col-md-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Fondos Disponibles</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">Bs. {{$total_desactivo->total}}</h2>
                                    </div>
                                    <small class="text-gray">Los fondos disponibles(Compras/Ventas), Solo Desactivos</small>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-university text-danger icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Libro contable</h4>
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha</th>
                                        <th>Descripcion</th>
                                        <th>Deber</th>
                                        <th>Haber</th>
                                        <th style="width:50px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contabilities as $contability)
                                    <tr>
                                        <td scope="row">
                                            <a href="#">{{$loop->iteration}}</a>
                                        </td>
                                        <td>{{\Carbon\Carbon::parse($contability->contability_date)->format('d M y h:i a')}}</td>
                                        <td>{{$contability->description}}</td>
                                        <td>{{$contability->must}}</td>
                                        <td>{{$contability->have}}</td>

                                        <td style="width: 50px;">
                                            <a href="#" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                            <a href="#" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-print"></i></a>
                                            <a href="#" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection