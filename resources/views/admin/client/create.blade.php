@extends('layouts.admin')
@section('title','Registro de clientes')
@section('styles')
@endsection
@section('create')
@endsection
@section('preference')
@endsection
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Registro de clientes</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de clientes</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de clientes</h4>
                        </div>
                        <hr>
                        
                        {!! Form::open(['route'=>'clients.store', 'method' => 'POST']) !!}

                            <div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name">Nombre y Apellido del cliente</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">
                                                    <i class="far fa-user menu-icon"></i>
                                                </span>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre y apellido del cliente" aria-describedby="addon-wrapping" required>
                                            </div>
                                            <small id="helpId" class="text-muted">Campo obligatorio.</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="dni">N° de cédula del cliente</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">
                                                    <i class="far fa-address-book menu-icon"></i>
                                                </span>
                                                <input type="number" class="form-control" name="dni" id="dni" placeholder="Cédula del cliente" aria-describedby="addon-wrapping" required>
                                            </div>
                                            <small id="helpId" class="text-muted">Campo obligatorio.</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="rif">N° rif del cliente</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">
                                                    <i class="far fa-address-book menu-icon"></i>
                                                </span>
                                                <input type="text" class="form-control" name="rif" id="rif" placeholder="Rif del cliente" aria-describedby="addon-wrapping">
                                            </div>
                                            <small id="helpId" class="text-muted">Campo opcional.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="email">Correo del cliente</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text">
                                                    <i class="far fa-paper-plane menu-icon"></i>
                                                </span>
                                                <input type="text" name="email" id="email" class="form-control" placeholder="Correo" data-inputmask="'alias': 'email'" >
                                            </div>
                                            <small id="helpId" class="text-muted">Campo opcional.</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="phone">Teléfono del cliente</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">
                                                    <i class="fa fa-phone menu-icon"></i>
                                                </span>
                                                <input type="number" class="form-control" name="phone" id="phone" placeholder="Número de teléfono del cliente" aria-describedby="addon-wrapping" required>
                                            </div>
                                            <small id="helpId" class="text-muted">Campo obligatorio.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="address">Dirección del cliente</label>
                                            <textarea name="address" id="maxlength-textarea" class="form-control" placeholder="Dirección del cliente." rows="5" maxlength="100"></textarea>
                                            <small id="helpId" class="text-muted">Campo obligatorio.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                            <a href="{{route('clients.index')}}" class="btn btn-light">Cancelar</a>
                        
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection