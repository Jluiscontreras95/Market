@extends('layouts.admin')
@section('title','Gestión de proveedores')
@section('styles')

    <style type="text/css">
        .unstyled-button
        {
            border:none;
            padding: 0;
            background: none;
        }

    </style>

@endsection
@section('create')
    <li class="nav-item d-none d-lg-flex">
        <a class="nav-link" href="{{route('providers.create')}}">
            <span class="btn btn-primary">+ Crear nuevo proveedor</span>
        </a>
    </li>
@endsection
@section('preference')
@endsection
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Proveedores</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Proveedores</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Proveedores</h4>
                            <!-- Default dropstart button -->
                            <div class="btn-group">
                                <a  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('providers.create')}}" class="dropdown-item">Agregar</a>
                                    <!-- <button class="dropdown-item" type="button">another action</button>
                                    <button class="dropdown-item" type="button">somethign else here</button> -->
                                </div>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Rif/Cedula</th>
                                        <th>Dirección</th>
                                        <th>Teléfono</th>
                                        <th>N° de cuenta</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($providers as $provider)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>
                                                <a href="{{ route('providers.show', $provider) }}">{{ $provider->name }}</a>
                                            </td> 
                                            <td>{{ $provider->email }}</td>
                                            <td>{{ $provider->rif_number }}</td>
                                            <td>{{ $provider->address }}</td>
                                            <td>{{ $provider->phone }}</td>
                                            <td>{{ $provider->account_bank }}</td>
                                            <td style="width: 50px;">
                                                {!! Form::open( ['route'=>['providers.destroy', $provider], 'method'=>'DELETE'] ) !!} 

                                                    <a class="jsgrid-button jsgrid-edit-button" href="{{ route('providers.edit', $provider) }}" title="Editar">
                                                        <li class="far fa-edit"></li>
                                                    </a>

                                                    <button type="submit" class="jsgrid-button jsgrid-delete-button unstyled-button" title="Eliminar">
                                                        <li class="far fa-trash-alt"></li>
                                                    </button>

                                                {!! Form::close() !!}
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
@section('scripts')

@endsection