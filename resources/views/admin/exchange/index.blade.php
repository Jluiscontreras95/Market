@extends('layouts.admin')
@section('title','Gestión de intercambio')
@section('styles')
    <style type="text/css">
        .unstyled-button 
            {
                border: none;
                padding: 0;
                background: none;
            }
    </style>
@endsection
@section('create')

    <li class="nav-item d-none d-lg-flex">
        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal-2">+ Nueva tasa del día</button>
    </li>

@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Intercambios</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Intercambio</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Tasa del día</h4>
                            <div class="btn-group">
                                <a  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('exchanges.create')}}" class="dropdown-item">Agregar</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha</th>
                                        <th>Tasa de cambio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($exchanges as $exchange)
                                        <tr>
                                            <th scope="row">{{ $exchange->id }}</th>
                                            <td>
                                                <a href="#">{{ $exchange->exchange_date }}</a>
                                            </td>
                                            <td>Bs. {{ $exchange->description }}</td>
                                            <td style="width: 50px;">
                                                {!! Form::open( ['route'=>['exchanges.destroy', $exchange], 'method'=>'DELETE'] ) !!} 

                                                    <a class="jsgrid-button jsgrid-edit-button" href="#" title="Editar">
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

    <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">agregar tasa del día</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {!! Form::open(['route'=>'exchanges.store', 'method' => 'POST']) !!}

                    <div class="modal-body">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="description"><strong>1$ va a ser igual a.</strong></label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text">Bs.</span>
                                        <input type="number" name="description" id="description" step="any" min="0.00" class="form-control" aria-describedby="helpId" placeholder="Tasa del día" required> 
                                    </div>
                                    <small id="helpId" class="text-muted">Campo obligatorio.</small>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection